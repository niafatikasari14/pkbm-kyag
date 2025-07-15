<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengumumanResource\Pages;
use App\Models\Pengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pengumuman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul_pengumuman')
                    ->label('Judul')
                    ->required()
                    ->maxLength(100),

                DatePicker::make('tanggal_pengumuman')
                    ->label('Tanggal Pengumuman')
                    ->required()
                    ->maxDate(now()),

                RichEditor::make('isi_pengumuman')
                    ->label('Isi Pengumuman')
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'bulletList', 'orderedList', 'blockquote',
                        'link', 'undo', 'redo',
                    ])
                    ->required(),

                FileUpload::make('file_pengumuman')
                    ->label('Lampiran (gambar/pdf)')
                    ->directory('pengumuman')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                    ->rules(['mimes:jpg,jpeg,png,pdf'])
                    ->preserveFilenames()
                    ->visibility('public')
                    ->previewable(false) // Nonaktifkan preview agar tidak terus loading
                    ->openable(false)    // Nonaktifkan tombol "Buka"
                    ->downloadable(false) // Nonaktifkan tombol "Unduh"
                    ->required(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul_pengumuman')
                    ->label('Judul')
                    ->limit(40),

                TextColumn::make('tanggal_pengumuman')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('isi_pengumuman')
                    ->label('Isi')
                    ->html()
                    ->limit(60),

                TextColumn::make('file_pengumuman')
                    ->label('File Lampiran')
                    ->url(fn ($record) => $record->file_pengumuman ? asset('storage/' . $record->file_pengumuman) : null)
                    ->limit(25),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengumumen::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }
}
