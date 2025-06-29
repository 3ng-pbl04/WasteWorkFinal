<?php

namespace App\Filament\Resources\Trash2Move;

use App\Filament\Resources\Trash2Move\ProdukResource\Pages;
use App\Filament\Resources\Trash2Move\ProdukResource\Pages\ListProduks;
use App\Filament\Resources\Trash2Move\ProdukResource\Pages\CreateProduk;
use App\Filament\Resources\Trash2Move\ProdukResource\Pages\EditProduk;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextInputColumn;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $pluralModelLabel = 'Produk';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->placeholder('Masukkan Nama Produk')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('jenis_produk')
                    ->placeholder('Masukkan Jenis Produk')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('harga')
                    ->placeholder('Masukkan Harga Produk')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),

                Forms\Components\TextInput::make('stok')
                    ->placeholder('Masukkan Stok Produk')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                 Forms\Components\Textarea::make('deskripsi')
                    ->placeholder('Masukkan Deskripsi Produk')
                    ->required()
                    ->rows(4),
            ]);
    }

    public static function table(Table $table): Table
    {


    return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('nama')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('jenis_produk')
                ->searchable(),

            Tables\Columns\TextColumn::make('harga')
                ->formatStateUsing(fn ($state) => 'Rp' . number_format($state, 0,',','.')),

            Tables\Columns\TextColumn::make('stok')
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->label('Tanggal Dibuat'),
        ])
        ->filters([])
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
