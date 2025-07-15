<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KalenderAkademikResource\Pages;
use App\Filament\Resources\KalenderAkademikResource\RelationManagers;
use App\Models\KalenderAkademik;
use Filament\Forms\Components\FileUpload;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KalenderAkademikResource extends Resource
{
    protected static ?string $model = KalenderAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): string
    {
        return 'Akademik';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kalender Akademik';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('gambar_kalender')
                ->image()
                ->directory('kalender')
                ->disk('public')
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->maxSize(2048) // 2MB
                ->preserveFilenames()
                ->visibility('public')
                ->previewable(false) // Nonaktifkan preview agar tidak terus loading
                ->openable(false)    // Nonaktifkan tombol "Buka"
                ->downloadable(false) // Nonaktifkan tombol "Unduh"
                ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar_kalender')
                    ->width(100)
                    ->url(fn ($record) => $record->kalender ? asset('storage/' . $record->kalenden) : null)
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListKalenderAkademiks::route('/'),
            'create' => Pages\CreateKalenderAkademik::route('/create'),
            'edit' => Pages\EditKalenderAkademik::route('/{record}/edit'),
        ];
    }
}
