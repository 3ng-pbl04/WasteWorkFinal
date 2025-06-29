<?php

namespace App\Filament\Resources\EcoAhto\HasilOlahResource\Pages;

use App\Filament\Resources\EcoAhto\HasilOlahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHasilOlahs extends ListRecords
{
    protected static string $resource = HasilOlahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Data')
                ->icon('heroicon-o-plus'),
        ];
    }
}
