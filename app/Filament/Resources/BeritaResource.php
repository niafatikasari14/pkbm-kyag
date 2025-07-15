<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;


class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Berita';

public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('judul_berita')
                ->label('Judul Berita')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, callable $set) {
                    $set('slug', Str::slug($state));
                }),

            TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->disabled()
                ->unique(ignoreRecord: true),

            DatePicker::make('tanggal_berita')
                ->label('Tanggal Berita')
                ->required(),

            RichEditor::make('isi_berita')
                ->label('Isi Berita')
                ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'bulletList', 'orderedList', 'blockquote',
                        'link', 'undo', 'redo',
                    ])
                ->required(),

            FileUpload::make('gambar_berita')
                ->label('Gambar Berita')
                ->image()
                ->disk('public')
                ->directory('berita')
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->maxSize(2048) // 2MB
                ->preserveFilenames()
                ->visibility('public')
                ->previewable(false) // Nonaktifkan preview agar tidak terus loading
                ->openable(false)    // Nonaktifkan tombol "Buka"
                ->downloadable(false) // Nonaktifkan tombol "Unduh"
                ->required(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                ->nullable()
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('judul_berita')
                ->label('Judul')
                ->sortable(),

            Tables\Columns\TextColumn::make('isi_berita')
                ->label('Isi Berita')
                ->html()
                ->limit(60),

            Tables\Columns\TextColumn::make('tanggal_berita')
                ->label('Tanggal')
                ->date('d M Y'),

            Tables\Columns\ImageColumn::make('gambar_berita')
                ->label('Gambar')
                ->url(fn ($record) => $record->berita ? asset('storage/' . $record->berita) : null)
                ->disk('public'),
        ])
        ->filters([
            //
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
        return [
            //
        ];
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
