<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganisasiStrukturResource\Pages;
use App\Models\OrganisasiStruktur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class OrganisasiStrukturResource extends Resource
{
    protected static ?string $model = OrganisasiStruktur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): string
    {
        return 'Tentang PKBM';
    }

    public static function getNavigationLabel(): string
    {
        return 'Struktur Organisasi';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('tahun_awal')
                ->label('Tahun Awal')
                ->options(
                    collect(range(2000, now()->year + 10))
                        ->mapWithKeys(fn ($y) => [$y => $y])
                        ->toArray()
                )
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                    $akhir = $get('tahun_akhir');
                    if ($akhir && $state > $akhir) {
                        $set('tahun_akhir', $state);
                    }
                }),

            Select::make('tahun_akhir')
                ->label('Tahun Akhir')
                ->options(
                    collect(range(2000, now()->year + 50))
                        ->mapWithKeys(fn ($y) => [$y => $y])
                        ->toArray())
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                    $awal = $get('tahun_awal');
                    if ($awal && $state < $awal) {
                        $set('tahun_awal', $state);
                    }
                }),

                RichEditor::make('struktur_organisasi')
                ->required()
                ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'bulletList', 'orderedList', 'blockquote',
                        'link', 'undo', 'redo',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('tahun_awal')
                ->sortable()
                ->label('Tahun Awal'),

            TextColumn::make('tahun_akhir')
                ->sortable()
                ->label('Tahun Akhir'),

            TextColumn::make('struktur_organisasi')
                ->label('Struktur Organisasi')
                ->html()
                ->limit(50), // hanya tampilkan 50 karakter pertama
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
            'index' => Pages\ListOrganisasiStrukturs::route('/'),
            'create' => Pages\CreateOrganisasiStruktur::route('/create'),
            'edit' => Pages\EditOrganisasiStruktur::route('/{record}/edit'),
        ];
    }
}
