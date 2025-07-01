<?php

namespace App\Filament\Resources\EcoAhto;

use Filament\Forms;
use Filament\Tables;
use App\Models\Karyawan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EcoAhto\KaryawanResource\Pages;
use App\Filament\Resources\EcoAhto\KaryawanResource\RelationManagers;

class KaryawanResource extends Resource
{
    protected static ?string $model = Karyawan::class;
     
     
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationLabel = 'Karyawan';
    protected static ?string $pluralModelLabel = 'Karyawan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->placeholder('Masukkan Nama Karyawan')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->placeholder('Masukkan Email Karyawan')
                    ->required(),

                Forms\Components\TextInput::make('notelp')
                    ->tel()
                    ->placeholder('Masukkan Nomor Telepon Karyawan')
                    ->label('Nomor Telepon')
                    ->required(),

                Forms\Components\TextArea::make('alamat')
                    ->placeholder('Masukkan Alamat Karyawan')
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

            Tables\Columns\TextColumn::make('email')
                ->searchable(),

            Tables\Columns\TextColumn::make('notelp')
                ->searchable(),

            Tables\Columns\TextColumn::make('alamat')
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
            'index' => Pages\ListKaryawans::route('/'),
            'create' => Pages\CreateKaryawan::route('/create'),
            'edit' => Pages\EditKaryawan::route('/{record}/edit'),
        ];
    }
    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->role === 'ecoahto';
    }
}
