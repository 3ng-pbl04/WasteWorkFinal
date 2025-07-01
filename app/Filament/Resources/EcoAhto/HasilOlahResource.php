<?php

namespace App\Filament\Resources\EcoAhto;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\HasilOlah;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EcoAhto\HasilOlahResource\Pages;
use App\Filament\Resources\EcoAhto\HasilOlahResource\RelationManagers;

class HasilOlahResource extends Resource
{
    protected static ?string $model = HasilOlah::class;
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationLabel = 'Hasil Olah';
    protected static ?string $pluralModelLabel = 'Hasil Olah';
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\TextInput::make('nama')
                ->placeholder('Masukkan Nama Hasil Olah')
                ->required(),

              Forms\Components\TextInput::make('bahan')
                ->placeholder('Masukkan Bahan Hasil Olah')
                ->required(),

              Forms\Components\TextInput::make('warna')
                ->placeholder('Masukkan Warna Hasil Olah')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('nama')
                ->sortable()
                ->searchable(),
                
            Tables\Columns\TextColumn::make('bahan')
                ->searchable(),
                
            Tables\Columns\TextColumn::make('warna')
                ->searchable(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                 Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHasilOlahs::route('/'),
            'create' => Pages\CreateHasilOlah::route('/create'),
            'edit' => Pages\EditHasilOlah::route('/{record}/edit'),
        ];
    }
    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->role === 'ecoahto';
    }
}
