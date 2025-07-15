<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AkreditasiResource\Pages;
use App\Filament\Resources\AkreditasiResource\RelationManagers;
use App\Models\Akreditasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AkreditasiResource extends Resource
{
    protected static ?string $model = Akreditasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function getNavigationGroup(): string
    {
        return 'Tentang PKBM';
    }

    public static function getNavigationLabel(): string
    {
        return 'Akreditasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('akreditasi')
                ->label('File Akreditasi')
                ->directory('akreditasi')
                ->disk('public')
                ->required()
                ->preserveFilenames()
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
            TextColumn::make('akreditasi')->label('File')->wrap()
            ->url(fn ($record) => $record->akreditasi ? asset('storage/' . $record->akreditasi) : null),
            TextColumn::make('created_at')->dateTime('d M Y')->sortable(),
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
            'index' => Pages\ListAkreditasis::route('/'),
            'create' => Pages\CreateAkreditasi::route('/create'),
            'edit' => Pages\EditAkreditasi::route('/{record}/edit'),
        ];
    }
}
