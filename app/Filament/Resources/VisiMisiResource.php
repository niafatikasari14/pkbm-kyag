<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Filament\Resources\VisiMisiResource\RelationManagers;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): string
    {
        return 'Tentang PKBM';
    }

    public static function getNavigationLabel(): string
    {
        return 'Visi & Misi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('visi_misi')
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
                TextColumn::make('visi_misi')
                ->html()
                ->label('Visi Misi'),
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
            'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
