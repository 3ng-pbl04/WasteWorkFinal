<?php

namespace App\Filament\EcoAhto\Widgets;

use App\Models\Sampah;
use App\Models\Karyawan;
use App\Models\HasilOlah;
use App\Models\BahanBaku;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\BarChartWidget;

class EcoAhtoOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Sampah Masuk', Sampah::count())
                ->description('Jumlah semua sampah tercatat')
                ->color('warning')
                ->icon('heroicon-o-trash'),

            Stat::make('Jumlah Karyawan', Karyawan::count())
                ->description('Karyawan aktif')
                ->color('primary')
                ->icon('heroicon-o-user-group'),

            Stat::make('Hasil Olah', HasilOlah::count())
                ->description('Produk hasil pengolahan')
                ->color('success')
                ->icon('heroicon-o-cube'),

            Stat::make('Bahan Baku', BahanBaku::count())
                ->description('Bahan yang tersedia')
                ->color('info')
                ->icon('heroicon-o-archive-box'),

            Stat::make('Sampah Hari Ini', Sampah::whereDate('created_at', now())->count())
                ->description('Sampah masuk hari ini')
                ->color('secondary')
                ->icon('heroicon-o-calendar-days'),

            Stat::make('Hasil Olah Hari Ini', HasilOlah::whereDate('created_at', now())->count())
                ->description('Produk hasil olah hari ini')
                ->color('green')
                ->icon('heroicon-o-cube-transparent'),
        ];
    }

    public function getColumnSpan(): int|string|array
    {
        return [
            'md' => 12,
            'xl' => 4,
        ];
    }
}

// Tambahkan file baru untuk chart, misal: EcoAhtoSampahChart.php
namespace App\Filament\EcoAhto\Widgets;

use Filament\Widgets\BarChartWidget;
use App\Models\Sampah;

class EcoAhtoSampahChart extends BarChartWidget
{
    protected static ?string $heading = 'Statistik Sampah Mingguan';

    protected function getData(): array
    {
        $data = [];
        $labels = [];
        foreach (range(6, 0) as $day) {
            $date = now()->subDays($day)->format('Y-m-d');
            $labels[] = now()->subDays($day)->format('D');
            $data[] = Sampah::whereDate('created_at', $date)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Sampah Masuk',
                    'data' => $data,
                    'backgroundColor' => '#fbbf24',
                ],
            ],
            'labels' => $labels,
        ];
    }

    public function getColumnSpan(): int|string|array
    {
        return [
            'md' => 12,
            'xl' => 12,
        ];
    }
}
