<?php

namespace App\Filament\Resources\EcoAhto\SampahResource\Pages;

use App\Filament\Resources\EcoAhto\SampahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSampahs extends ListRecords
{
    protected static string $resource = SampahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Data')
                ->icon('heroicon-o-plus'),
        ];
    }
}
