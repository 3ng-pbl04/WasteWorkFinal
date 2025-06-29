<?php
namespace App\Filament\Resources\Ecoahto;

use App\Filament\Resources\EcoAhto\BahanBakuResource\Pages;
use App\Models\BahanBaku;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;

class BahanBakuResource extends Resource
{
    protected static ?string $model = BahanBaku::class;
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationLabel = 'Bahan Baku';
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $pluralModelLabel = 'Bahan Baku';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                    ->placeholder('Masukkan Kode Bahan Baku')
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('nama_bahan_baku')
                    ->placeholder('Masukkan Nama Bahan Baku')
                    ->label('Nama')
                    ->required(),

                Forms\Components\TextInput::make('jumlah')
                    ->placeholder('Masukkan Jumlah Bahan Baku')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('warna')
                    ->placeholder('Masukkan Warna Bahan Baku')
                    ->required(),

                Forms\Components\TextInput::make('asal')
                    ->placeholder('Masukkan Asal Bahan Baku')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_olah')
                    ->label('Tanggal Diolah')
                    ->required(),
                    
                Forms\Components\Select::make('status')
                    ->options([
                        'Mentah' => 'Mentah',
                        'Diolah' => 'Diolah',
                        'Jadi' => 'Jadi',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama_bahan_baku')
                    ->label('Nama'),

                Tables\Columns\TextColumn::make('jumlah')
                    ->sortable(),

                Tables\Columns\TextColumn::make('warna'),

                Tables\Columns\TextColumn::make('asal'),
                
                Tables\Columns\TextColumn::make('tanggal_olah')
                    ->date(),
                 Tables\Columns\BadgeColumn::make('status')->colors([
                    'warning' => 'Mentah',
                    'info' => 'Diolah',
                   'success' => 'Jadi',
                ])
                ->sortable(),

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
            'index' => Pages\ListBahanBakus::route('/'),
            'create' => Pages\CreateBahanBaku::route('/create'),
            'edit' => Pages\EditBahanBaku::route('/{record}/edit'),
        ];
    }
}
