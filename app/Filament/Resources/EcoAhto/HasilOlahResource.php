<?php

namespace App\Filament\Resources\EcoAhto;

use App\Filament\Resources\EcoAhto\HasilOlahResource\Pages;
use App\Filament\Resources\EcoAhto\HasilOlahResource\RelationManagers;
use App\Models\HasilOlah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HasilOlahResource extends Resource
{
    protected static ?string $model = HasilOlah::class;
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationLabel = 'Hasil Olah';
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\TextInput::make('nama')->required(),
                 Forms\Components\TextInput::make('bahan')->required(),
                  Forms\Components\TextInput::make('warna')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('nama'),
            Tables\Columns\TextColumn::make('bahan'),
            Tables\Columns\TextColumn::make('warna'),
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
}
