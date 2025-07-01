<?php

namespace App\Filament\Trash2Move\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Volunteer;
use Illuminate\Support\Facades\DB;


class PengaduanChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Kumulatif Jumlah Volunteer';

    protected function getData(): array
    {
        // Ambil tanggal unik dari created_at dan deleted_at
        $createdDates = Volunteer::select(DB::raw('DATE(created_at) as date'))->pluck('date');
        $deletedDates = Volunteer::onlyTrashed()
            ->select(DB::raw('DATE(deleted_at) as date'))
            ->pluck('date');

        // Gabungkan dan urutkan semua tanggal unik
        $dates = $createdDates->merge($deletedDates)->unique()->sort()->values();

        $labels = [];
        $cumulativeData = [];
        $totalData = [];

        $cumulative = 0;

        foreach ($dates as $date) {
            if ($date === null) continue; // Cegah error "Illegal operator"

            $added = Volunteer::whereDate('created_at', $date)->count();

            $removed = Volunteer::onlyTrashed()
                ->whereDate('deleted_at', $date)
                ->count();

            $cumulative += $added;
            $cumulative -= $removed;

            $labels[] = $date;
            $cumulativeData[] = $cumulative;

            $total = Volunteer::whereDate('created_at', '<=', $date)
                ->where(function ($query) use ($date) {
                    $query->whereNull('deleted_at')
                        ->orWhereDate('deleted_at', '>', $date);
                })
                ->count();

            $totalData[] = $total;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Pertumbuhan Volunteer',
                    'data' => $cumulativeData,
                    'borderColor' => '#ef4444', // merah
                    'backgroundColor' => 'rgba(239, 68, 68, 0.2)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
                [
                    'label' => 'Total Volunteer',
                    'data' => $totalData,
                    'borderColor' => '#3b82f6', // biru
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'fill' => false,
                    'tension' => 0.3,
                ],
            ],
            'options' => [
                'scales' => [
                    'y' => [
                        'ticks' => [
                            'callback' => 'function(value) { return value.toFixed(2); }',
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public function getColumnSpan(): int|string|array
{
    return 'full';
}

}
