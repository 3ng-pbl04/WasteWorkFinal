<?php

namespace App\Filament\Resources\Trash2Move;

use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Filament\Resources\Trash2Move\PengaduanResource\Pages;
use App\Mail\PengaduanDirespon;
use Illuminate\Support\Facades\Mail;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;
    protected static ?string $navigationGroup = 'Manajemen';
    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    protected static ?string $navigationLabel = 'Pengaduan';
    protected static ?string $pluralModelLabel = 'Pengaduan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->required()
                ->maxLength(255),

            TextInput::make('no_telp')
                ->required()
                ->maxLength(255),

            Textarea::make('alamat')
                ->required(),

            FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->imagePreviewHeight('150')
                ->disk('public')
                ->directory('pengaduan_foto')
                ->preserveFilenames()
                ->downloadable()
                ->openable()
                ->disabled(),

            Textarea::make('keterangan')
                ->required(),

            TextInput::make('titik_koordinat')
                ->required()
                ->maxLength(255),

            Select::make('status')
                ->options([
                    'Terkirim' => 'Terkirim',
                    'Ditolak' => 'Ditolak',
                    'Diterima' => 'Diterima',
                    'Dijadwalkan' => 'Dijadwalkan',
                ])
                ->default('Terkirim')
                ->required()
                ->reactive()
                ->afterStateUpdated(function ($state, $livewire, $set, $get) {
                    $pengaduan = $livewire->record;

                    if ($state !== 'Terkirim') {
                        $pengaduan->status = $state;
                        $pengaduan->catatan_admin = $get('catatan_admin');
                        $pengaduan->save();

                        Mail::to($pengaduan->email)->send(new PengaduanDirespon($pengaduan));
                    }
                }),

            Textarea::make('catatan_admin')
                ->label('Catatan Admin')
                ->rows(3)
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable()->searchable(),
            TextColumn::make('nama')->sortable()->searchable(),
            TextColumn::make('no_telp'),
            TextColumn::make('email'),
            TextColumn::make('alamat')->limit(30),
            Tables\Columns\ImageColumn::make('foto')->label('Gambar')->circular(),
            TextColumn::make('keterangan')->limit(50),
            TextColumn::make('titik_koordinat'),
            TextColumn::make('status')
                ->badge()
                ->colors([
                    'warning' => 'Terkirim',
                    'danger' => 'Ditolak',
                    'success' => 'Diterima',
                    'primary' => 'Dijadwalkan',
                ]),
            TextColumn::make('created_at')
                ->dateTime('d/m/Y H:i')
                ->label('Dibuat'),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'Terkirim' => 'Terkirim',
                    'Ditolak' => 'Ditolak',
                    'Diterima' => 'Diterima',
                    'Dijadwalkan' => 'Dijadwalkan',
                ]),
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
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
