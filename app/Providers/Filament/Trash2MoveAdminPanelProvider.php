<?php

namespace App\Providers\Filament;

use App\Filament\Trash2Move\Widgets\StatsOverview;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Pages\Dashboard;

use App\Filament\Trash2Move\Widgets\ProdukOverview;
use App\Filament\Trash2Move\Widgets\PengaduanTerbaru;
use App\Filament\Trash2Move\Widgets\PengaduanChart;
use App\Filament\Trash2Move\Widgets\QuickActions;
use App\Filament\Trash2Move\Widgets\Produkinfo;
use App\Filament\Pages\Trash2Move\Auth\LoginCustom;

use App\Models\Pengaduan;
use App\Models\Produk;

class Trash2MoveAdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('trash2move')
            ->path('admin-trash')
            ->brandName('Trash2Move')
            ->login(action: LoginCustom::class)
            ->authGuard('trash')
            ->discoverResources(app_path('Filament/Resources/Trash2Move'), 'App\\Filament\\Resources\\Trash2Move')
            ->discoverPages(app_path('Filament/Pages/Trash2Move'), 'App\\Filament\\Pages\\Trash2Move')
            ->discoverWidgets(in: app_path('Filament/Trash2Move/Widgets'), for: 'App\\Filament\\Trash2Move\\Widgets')
            ->widgets([
                StatsOverview::class,
                ProdukOverview::class,
                Produkinfo::class,
                PengaduanTerbaru::class,
                PengaduanChart::class,
                QuickActions::class,
            ])
            ->pages([
                Dashboard::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
