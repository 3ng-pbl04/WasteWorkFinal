<?php

namespace App\Filament\Trash2Move\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
        Stat::make(
            'Jumlah Pengaduan Bulan Ini (' . now()->format('F Y') . ')',
            \App\Models\Pengaduan::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count()
        )
            ->description('Total pengaduan dalam 1 bulan')
            ->icon('heroicon-o-clipboard-document'),

        Stat::make(
            'Total User Terdaftar',
            \App\Models\User::count()
        )
            ->description('Jumlah seluruh user yang terdaftar')
            ->icon('heroicon-o-users'),

    

        Stat::make(
            'Jumlah Postingan',
            \App\Models\Postingan::count()
        )
            ->description('Total seluruh postingan')
            ->icon('heroicon-o-document-text')
    ];
    }

    public function getColumnSpan(): int|string|array
{
    return 'full';
}

}
