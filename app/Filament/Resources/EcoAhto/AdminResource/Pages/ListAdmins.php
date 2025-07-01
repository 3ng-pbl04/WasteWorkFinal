<?php

namespace App\Filament\Resources\EcoAhto\AdminResource\Pages;

use App\Filament\Resources\EcoAhto\AdminResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Data')
            ->icon('heroicon-o-plus'),

        ];
    }
    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->where('role', 'ecoahto');
    }
}
