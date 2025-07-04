<?php

namespace App\Filament\Resources\EcoAhto\KaryawanResource\Pages;

use App\Filament\Resources\EcoAhto\KaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKaryawans extends ListRecords
{
    protected static string $resource = KaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Data')
                ->icon('heroicon-o-plus'),
        ];
    }
}
