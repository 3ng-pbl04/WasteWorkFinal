<?php

namespace App\Filament\Resources\Trash2Move;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ulasan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use App\Filament\Resources\Trash2Move\UlasanResource\Pages;

class UlasanResource extends Resource
{
    protected static ?string $model = Ulasan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationLabel = 'Ulasan';
    protected static ?string $pluralModelLabel = 'Ulasan';
    protected static ?string $navigationGroup = 'Konten';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                   // ->maxLength(255),
                Forms\Components\TextInput::make('peran')->required(),
                    //->maxLength(255),
                Forms\Components\Textarea::make('komentar')->required(),
                    //->rows(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('peran')->sortable(),
                Tables\Columns\TextColumn::make('komentar')->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUlasans::route('/'),
            //'create' => Pages\CreateUlasan::route('/create'),
            //'edit' => Pages\EditUlasan::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->role === 'trash2move';
    }
}
