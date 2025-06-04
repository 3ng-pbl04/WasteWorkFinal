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
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),



                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->directory('postingans') // disimpan di storage/app/public/postingans
                    ->required(),

                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->rows(6),

                Forms\Components\TextInput::make('link_produk')
                    ->label('Link Produk')
                    ->url()
                    ->maxLength(255),

              
                
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('gambar')->circular(),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime(),
            ])
            ->actions([
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
