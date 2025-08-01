<?php

namespace App\Filament\Resources\EcoAhto\KaryawanResource\Pages;

use App\Filament\Resources\EcoAhto\KaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKaryawan extends CreateRecord
{
    protected static string $resource = KaryawanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
