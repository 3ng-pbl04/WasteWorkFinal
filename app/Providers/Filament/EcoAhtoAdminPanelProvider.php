<?php

namespace App\Providers\Filament;

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
use App\Models\Admin;
use Filament\Pages\Dashboard;
use App\Filament\Admin\Widgets\AccountWidget;
use App\Filament\Admin\Widgets\FilamentInfoWidget;
use App\Filament\EcoAhto\Widgets\EcoAhtoOverview;
use App\Filament\EcoAhto\Widgets\RecentSampahTable;
use App\Filament\EcoAhto\Widgets\SampahMasukChart;

class EcoAhtoAdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('ecoahto')
            ->path('admin-ecoahto')
            ->login()
            ->brandName('EcoAhto')
            ->authGuard('eco')
            ->discoverResources(app_path('Filament/Resources/EcoAhto'), 'App\\Filament\\Resources\\EcoAhto')
            ->discoverPages(app_path('Filament/Pages/EcoAhto'), 'App\\Filament\\Pages\\EcoAhto')
            // ->discoverWidgets(in: app_path('Filament/EcoAhto/Widgets'), for: 'App\\Filament\\EcoAhto\\Widgets')
            ->widgets([
            SampahMasukChart::make(),
            EcoAhtoOverview::make(),
            RecentSampahTable::make(),
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
