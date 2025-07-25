<?php

namespace App\Filament\Resources\Trash2Move;

use App\Models\Mitra;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\Trash2Move\MitraResource\Pages;

class MitraResource extends Resource
{
    protected static ?string $model = Mitra::class;

    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Mitra';
    protected static ?string $pluralModelLabel = 'Mitra';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->placeholder('Masukkan Nama Mitra')
                ->required()
                ->maxLength(255),

            TextInput::make('kontak')
                ->tel()
                ->placeholder('Masukkan Kontak Mitra')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->placeholder('Masukkan Email Mitra')
                ->required()
                ->email()
                ->maxLength(255),

            Textarea::make('alamat')
                ->placeholder('Masukkan Alamat Mitra')
                ->required()
                ->maxLength(500),

            Select::make('status')
                ->required()
                ->options([
                    'aktif' => 'Aktif',
                    'tidak aktif' => 'Tidak Aktif',
                ])
                ->default('aktif'),

            \Filament\Forms\Components\FileUpload::make('logo_mitra')
                ->label('Logo Mitra')
                ->image()
                ->directory('mitra-logos')
                ->maxSize(2048)
                ->imagePreviewHeight('100')
                ->required(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kontak'),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('alamat')
                    ->limit(30),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'tidak aktif' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('logo_mitra')
                    ->label('Logo Mitra')
                    ->formatStateUsing(fn ($state) => $state ? '<img src="' . asset('storage/' . $state) . '" style="height:40px;width:40px;object-fit:cover;border-radius:50%;" />' : '-')
                    ->html(),



            ])
            ->defaultSort('id', 'desc')
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMitras::route('/'),
            'create' => Pages\CreateMitra::route('/create'),
            'edit' => Pages\EditMitra::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->role === 'trash2move';
    }
}
