<?php

namespace App\Filament\Pages\Trash2Move;

use Filament\Facades\Filament;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public static function shouldRegisterNavigation(): bool
    {
        return ! in_array(
            Filament::auth()->user()?->role,
            ['ceoT2m']   // role yang tidak bisa akses dashboard
        );
    }
    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->role !== 'ceoT2m';
    }
}
