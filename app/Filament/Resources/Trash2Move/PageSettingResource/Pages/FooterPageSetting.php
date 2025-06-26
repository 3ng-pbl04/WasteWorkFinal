<?php

namespace App\Filament\Resources\Trash2Move\PageSettingResource\Pages;

use App\Filament\Resources\Trash2Move\PageSettingResource;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class FooterPageSetting extends EditRecord
{
    protected static string $resource = PageSettingResource::class;
    public function getTitle(): string
    {
        return 'Konfigurasi Footer';
    }
public function getBreadcrumbs(): array
{
    return [];
}
    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('footer_text')
                ->label('Teks Footer')
                ->required(),

            TextInput::make('facebook_link')
                ->label('Facebook')
                ->url()
                ->nullable(),

            TextInput::make('instagram_link')
                ->label('Instagram')
                ->url()
                ->nullable(),

            TextInput::make('twitter_link')
                ->label('Twitter')
                ->url()
                ->nullable(),

            TextInput::make('youtube_link')
                ->label('YouTube')
                ->url()
                ->nullable(),

            TextInput::make('tiktok_link')
                ->label('TikTok')
                ->url()
                ->nullable(),

            Textarea::make('alamat')
                ->label('Alamat')
                ->rows(3)
                ->nullable(),

        ]);
    }
}
