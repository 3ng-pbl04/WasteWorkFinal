<?php

namespace App\Filament\Resources\EcoAhto\AdminResource\Pages;

use App\Filament\Resources\EcoAhto\AdminResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmin extends EditRecord
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
