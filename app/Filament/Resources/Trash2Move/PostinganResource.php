<?php

namespace App\Filament\Resources\Trash2Move;

use App\Filament\Resources\Trash2Move\PostinganResource\Pages;
use App\Models\Postingan;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class PostinganResource extends Resource
{
    protected static ?string $model = Postingan::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Postingan';
    protected static ?string $pluralModelLabel = 'Postingan';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextArea::make('nama')
                    ->placeholder('Masukkan Nama Produk')
                    ->required()
                    ->label('Nama Produk')
                    ->maxLength(255),

                Forms\Components\TextInput::make('harga')
                    ->placeholder('Masukkan Harga Produk')
                    ->prefix('Rp')
                    ->label('Harga')
                    ->maxLength(100),

                Forms\Components\TextInput::make('rating')
                    ->placeholder('Masukkan Rating Produk(1-5)')
                    ->numeric()          
                    ->minValue(1)        
                    ->maxValue(5)        
                    ->step(0.5)          
                    ->label('Rating')
                    ->required(),

                Forms\Components\TextInput::make('link')
                    ->placeholder('Masukkan Link Produk')
                    ->label('Link Beli')
                    ->url()
                    ->maxLength(255),

                  Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar Produk')
                    ->directory('postingans')
                    ->disk('public')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->downloadable()
                    ->openable()
                    ->preserveFilenames()
                    ->visibility('public'),

                 Forms\Components\Textarea::make('deskripsi')
                    ->placeholder('Masukkan Deskripsi Produk')
                    ->required()
                    ->label('Deskripsi')
                    ->rows(5),

            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()   
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->circular(),

                Tables\Columns\TextColumn::make('harga')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => 'Rp' . number_format($state, 0,',','.'))
                    ->label('Harga'),

                Tables\Columns\TextColumn::make('rating')
                    ->sortable()
                    ->label('Rating'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPostingans::route('/'),
            'create' => Pages\CreatePostingan::route('/create'),
            'edit' => Pages\EditPostingan::route('/{record}/edit'),
        ];
    }
}
