<?php

namespace App\Filament\EcoAhto\Widgets;

use App\Models\Sampah;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class RecentSampahTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return Sampah::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('jenis_sampah'),
            TextColumn::make('berat')->suffix(' kg'),
            TextColumn::make('tanggal_masuk')->date(),
           Tables\Columns\SelectColumn::make('status')
    ->options([
        'Masuk' => 'Masuk',
        'Disortir' => 'Disortir',
        'Dicacah' => 'Dicacah',
        'Dikeringkan' => 'Dikeringkan',
        'Dipilah' => 'Dipilah',
        'Selesai' => 'Selesai',
    ])
    ->default('Masuk') // 👈 tambahkan ini
    ->sortable()
    ->searchable(),

        ];
    }

    public function getColumnSpan(): int|string|array
{
    return [
        'md' => 6,
        'xl' => 8,
    ];
}

}
