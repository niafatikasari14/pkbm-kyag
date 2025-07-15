<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use Filament\Forms\Components\FileUpload;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): string
    {
        return 'Tentang PKBM';
    }

    public static function getNavigationLabel(): string
    {
        return 'Guru';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textinput::make('nama_guru')->required(),
                Forms\Components\Textinput::make('jabatan_guru')->required(),
                Forms\Components\FileUpload::make('foto_guru')
                ->image()
                ->directory('fotoguru')
                ->disk('public')
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->maxSize(2048) // 2MB
                ->preserveFilenames()
                ->visibility('public')
                ->previewable(false) // Nonaktifkan preview agar tidak terus loading
                ->openable(false)    // Nonaktifkan tombol "Buka"
                ->downloadable(false) // Nonaktifkan tombol "Unduh"
                ->nullable()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_guru'),
                Tables\Columns\TextColumn::make('jabatan_guru'),
                Tables\Columns\ImageColumn::make('foto_guru')
                    ->width(100)
                    ->url(fn ($record) => $record->fotoguru ? asset('storage/' . $record->fotoguru) : null)
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
