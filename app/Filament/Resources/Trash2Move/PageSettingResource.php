<?php

namespace App\Filament\Resources\Trash2Move;

use App\Models\PageSetting;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Navigation\NavigationItem;
use App\Filament\Resources\Trash2Move\PageSettingResource\Pages;

class PageSettingResource extends Resource
{
    protected static ?string $model = PageSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $navigationLabel = 'Kelola Halaman';

    public static function hasNavigation(): bool
    {
        return true;
    }

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make('Hero')
                ->url(static::getUrl('hero', ['record' => 1]))
                ->icon('heroicon-o-photo')
                ->group('Kelola Halaman'),

            NavigationItem::make('Tentang Kami')
                ->url(static::getUrl('about', ['record' => 1]))
                ->icon('heroicon-o-information-circle')
                ->group('Kelola Halaman'),

            NavigationItem::make('Footer')
                ->url(static::getUrl('footer', ['record' => 1]))
                ->icon('heroicon-o-view-columns')
                ->group('Kelola Halaman'),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageSettings::route('/'),
            'hero' => Pages\HeroPageSetting::route('/hero/{record}/edit'),
            'about' => Pages\AboutPageSetting::route('/about/{record}/edit'),
            'footer' => Pages\FooterPageSetting::route('/footer/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->role === 'trash2move';
    }

    public static function getBreadcrumbs(): array
{
    return [];
}
}
