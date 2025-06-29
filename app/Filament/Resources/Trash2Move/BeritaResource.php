<?php
namespace App\Filament\Resources\Trash2Move;

use App\Filament\Resources\Trash2Move\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';


    public static function form(Forms\Form $form): Forms\Form
    {
            return $form
            ->schema([
        Forms\Components\TextInput::make('judul')
            ->placeholder('Masukkan Judul Berita')
            ->required()
            ->label('Judul Berita')
            ->maxLength(255),

        Forms\Components\DatePicker::make('tanggal')
            ->required()
            ->label('Tanggal Berita'),

        Forms\Components\Textarea::make('deskripsi')
            ->placeholder('Masukkan Deskripsi Berita')   
            ->required()
            ->label('Deskripsi')
            ->rows(5),

        Forms\Components\FileUpload::make('gambar')
            ->label('Gambar Berita')
            ->directory('berita')
            ->disk('public')
            ->image()
            ->imagePreviewHeight('150')
            ->downloadable()
            ->openable()
            ->preserveFilenames()
            ->visibility('public'),
            ]);

    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->date(),

                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->circular(),

                 Tables\Columns\TextColumn::make('admin.name')
                    ->label('Admin Pembuat')
                    ->sortable()
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->label('Diposting'),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
