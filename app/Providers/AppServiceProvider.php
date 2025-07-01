<?php

namespace App\Providers;

use App\Models\PageSetting;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register render hook untuk custom CSS login Filament
        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            fn (): string => Blade::render('@vite("resources/css/custom-login.css")')
        );

        // View composer global untuk semua view
        View::composer('*', function ($view) {
            $view->with('page_settings', PageSetting::first());
        });
    }
}
