<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaranaPrasaranaResource\Pages;
use App\Filament\Resources\SaranaPrasaranaResource\RelationManagers;
use App\Models\SaranaPrasarana;
use Filament\Forms\Components\FileUpload;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaranaPrasaranaResource extends Resource
{
    protected static ?string $model = SaranaPrasarana::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getNavigationGroup(): string
    {
        return 'Akademik';
    }

    public static function getNavigationLabel(): string
    {
        return 'Sarana Prasarana';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textinput::make('nama_fasilitas')->required(),
                Forms\Components\FileUpload::make('gambar_fasilitas')
                    ->image()
                    ->directory('Fasilitas')
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
                Tables\Columns\TextColumn::make('nama_fasilitas'),
                Tables\Columns\ImageColumn::make('gambar_fasilitas')
                    ->width(100)
                    ->url(fn ($record) => $record->Fasilitas ? asset('storage/' . $record->Fasilitas) : null)
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
            'index' => Pages\ListSaranaPrasaranas::route('/'),
            'create' => Pages\CreateSaranaPrasarana::route('/create'),
            'edit' => Pages\EditSaranaPrasarana::route('/{record}/edit'),
        ];
    }
}
