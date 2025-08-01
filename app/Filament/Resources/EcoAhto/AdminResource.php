<?php

namespace App\Filament\Resources\EcoAhto;

use Filament\Forms;
use Filament\Tables;
use App\Models\Admin;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EcoAhto\AdminResource\Pages;
use App\Filament\Resources\EcoAhto\AdminResource\RelationManagers;
use Filament\Facades\Filament;


class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationLabel = 'Kelola Admin';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $pluralModelLabel = 'Kelola Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('username')
                    ->placeholder('Masukkan Username Admin')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->placeholder('Masukkan Password Admin')
                    ->email()
                    ->maxLength(255)
                    ->default(null),

                Forms\Components\TextInput::make('name')
                    ->placeholder('Masukkan Nama Admin')
                    ->maxLength(255)
                    ->default(null),

                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->placeholder('Masukkan Password Admin')
                    ->password()
                    ->required(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state)) 
                    ->autocomplete('new-password'),

                Select::make('role')
                    ->label('Role')
                    ->options([
                        'ecoahto' => 'Ecoahto',
                        'ceoEco' => 'CEO Ecoahto',
                    ])
                    ->searchable()
                    ->native(false)
                    ->required()
                        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('username')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('role')
                    ->label('Peran')
                    ->sortable()
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'ecoahto' => 'Ecoahto',
                        'ceoEco' => 'CEO Ecoahto',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
    public static function canAccess(): bool
    {
        // Hanya CEO Ecoahto
        return Filament::auth()->user()?->role === 'ceoEco';
    }
}
