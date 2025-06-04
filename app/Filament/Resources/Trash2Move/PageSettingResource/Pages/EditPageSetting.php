<?php

namespace App\Filament\Resources\Trash2Move\PageSettingResource\Pages;


use App\Filament\Resources\Trash2Move\PageSettingResource;
// use App\Filament\Resources\Trash2Move\PageSettingResource;
use App\Filament\Resources\Trash2Move\PageSettingResource; // Make sure this path is correct

// If the actual namespace is different, update it accordingly, for example:
// use App\Filament\Resources\Trash2Move\PageSettingResource\PageSettingResource;
use Filament\Resources\Pages\EditRecord;

class EditPageSetting extends EditRecord
{
    protected static string $resource = PageSettingResource::class;

    protected function getHeaderActions(): array
    {
        return []; // Hilangkan tombol delete
    }
    
}
