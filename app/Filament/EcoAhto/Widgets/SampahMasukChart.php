<?php

namespace App\Filament\EcoAhto\Widgets;

use App\Models\Sampah;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SampahMasukChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Jumlah Sampah Masuk per Hari';

    protected function getData(): array
    {
        // Ambil data jumlah sampah per tanggal masuk
        $data = Sampah::select(DB::raw('DATE(tanggal_masuk) as date'), DB::raw('COUNT(*) as total'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = $data->pluck('date')->map(function ($date) {
            return date('d M Y', strtotime($date));
        })->toArray();

        $values = $data->pluck('total')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Sampah Masuk',
                    'data' => $values,
                    'borderColor' => '#10b981', // green-500
                    'backgroundColor' => 'rgba(16, 185, 129, 0.3)',
                    'fill' => true,
                    'tension' => 0.4,
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
    return [
        'md' => 6,
        'xl' => 12,
    ];
}


   

}
