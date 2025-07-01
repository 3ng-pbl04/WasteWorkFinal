<?php

namespace App\Filament\Resources\Trash2Move;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Volunteer;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Trash2Move\VolunteerResource\Pages;

class VolunteerResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationLabel = 'Volunteer';
    protected static ?string $pluralModelLabel = 'Volunteer';
    protected static ?string $model = Volunteer::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')
                ->required(),

            Forms\Components\TextInput::make('no_telp')
                ->required()->tel(),

            Forms\Components\TextInput::make('status_kesehatan'),

            Forms\Components\Textarea::make('alamat')
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

                Tables\Columns\TextColumn::make('no_telp')
                    ->searchable(),

                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status_kesehatan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('penjelasan')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVolunteers::route('/'),
            'create' => Pages\CreateVolunteer::route('/create'),
            'edit' => Pages\EditVolunteer::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->role === 'trash2move';
    }
}
