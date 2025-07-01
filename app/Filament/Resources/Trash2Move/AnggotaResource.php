<?php
namespace App\Filament\Resources\Trash2Move;

use Filament\Forms;
use Filament\Tables;
use App\Models\Anggota;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Tables\Actions\CreateAction;
use App\Filament\Resources\Trash2Move\AnggotaResource\Pages;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationLabel = 'Anggota';
    protected static ?string $pluralModelLabel = 'Anggota';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')
                ->placeholder('Masukkan Nama Anggota')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->placeholder('Masukkan Email Anggota')
                ->required()
                ->email()
                ->maxLength(255),

            Forms\Components\TextInput::make('no_telp')
                ->tel()
                ->placeholder('Masukkan Nomor Telepon Anggota')
                ->label('Nomor Telepon')
                ->required()
                ->maxLength(20),

            Forms\Components\DatePicker::make('tanggal_bergabung')
                ->required()
                ->label('Tanggal Bergabung'),

            Forms\Components\Textarea::make('alamat')
                ->placeholder('Masukkan Alamat Anggota')
                ->required()
                ->rows(3),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('no_telp')
                    ->searchable()
                    ->label('Nomor Telepon'),

                Tables\Columns\TextColumn::make('tanggal_bergabung')   
                    ->date()
                    ->label('Tanggal Bergabung'),
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
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }

    public static function getActions(): array
    {
        return [
            CreateAction::make()
                ->afterCreate(function () {
                    redirect(static::getUrl('index'))->send();
                }),
        ];
    }

    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->role === 'trash2move';
    }
}
