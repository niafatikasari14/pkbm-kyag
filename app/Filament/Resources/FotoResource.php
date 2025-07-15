<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FotoResource\Pages;
use App\Filament\Resources\FotoResource\RelationManagers;
use App\Models\Foto;
use Filament\Forms\Components\FileUpload;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FotoResource extends Resource
{
    protected static ?string $model = Foto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getNavigationLabel(): string
    {
        return 'Galeri Foto';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textinput::make('nama_kegiatan')->required(),
                Forms\Components\FileUpload::make('foto_kegiatan')
                ->image()
                ->directory('fotogaleri')
                ->disk('public')
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->maxSize(2048) // 2MB
                ->preserveFilenames()
                ->visibility('public')
                ->previewable(false) // Nonaktifkan preview agar tidak terus loading
                ->nullable()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kegiatan'),
                Tables\Columns\ImageColumn::make('foto_kegiatan')
                ->width(100)
                ->url(fn ($record) => $record->fotogaleri ? asset('storage/' . $record->fotogaleri) : null)
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
            'index' => Pages\ListFotos::route('/'),
            'create' => Pages\CreateFoto::route('/create'),
            'edit' => Pages\EditFoto::route('/{record}/edit'),
        ];
    }
}
