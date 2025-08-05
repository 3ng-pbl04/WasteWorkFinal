<?php

namespace App\Filament\Resources\EcoAhto;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sampah;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use App\Filament\Resources\EcoAhto\SampahResource\Pages;

class SampahResource extends Resource
{
    protected static ?string $model = Sampah::class;
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationLabel = 'Sampah';
    protected static ?string $navigationIcon = 'heroicon-o-trash';
    protected static ?string $pluralModelLabel = 'Sampah';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jenis_sampah')
                    ->placeholder("Masukkan Sampah")
                    ->required(),

                Forms\Components\TextInput::make('warna')
                    ->placeholder("Masukkan Warna sampah")
                    ->required(),

                Forms\Components\TextInput::make('berat')
                    ->placeholder("Masukkan Berat sampah")
                    ->numeric()
                    ->required()
                    ->suffix('kg'),

                Forms\Components\DatePicker::make('tanggal_masuk')
                    ->label("Tanggal Timbang")
                    ->required(),

                Forms\Components\TextInput::make('sumber')
                    ->placeholder("Masukkan Asal/Sumber sampah")
                    ->required(),

                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'Masuk' => 'Masuk',
                        'Disortir' => 'Disortir',
                        'Dicacah' => 'Dicacah',
                        'Dikeringkan' => 'Dikeringkan',
                        'Dipilah' => 'Dipilah',
                        'Selesai' => 'Selesai',
                    ]),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis_sampah')
                    ->label("Sampah")
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('warna'),

                Tables\Columns\TextColumn::make('berat')
                    ->sortable()
                    ->suffix(' kg'),

                Tables\Columns\TextColumn::make('tanggal_masuk')
                    ->label("Tanggal Timbang")
                    ->date(),

                Tables\Columns\TextColumn::make('sumber'),
                
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Masuk' => 'primary',
                    'Disortir' => 'warning',
                    'Dicacah' => 'info',
                    'Dikeringkan' => 'yellow',
                    'Dipilah' => 'purple',
                    'Selesai' => 'success',
                    default => 'secondary',
                })

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSampahs::route('/'),
            'create' => Pages\CreateSampah::route('/create'),
            'edit' => Pages\EditSampah::route('/{record}/edit'),
        ];
    }
    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->role === 'ecoahto';
    }
}
