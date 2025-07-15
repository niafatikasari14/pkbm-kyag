<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Filament\Resources\PendaftaranResource\RelationManagers;
use App\Models\Pendaftaran;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('alur_pendaftaran')
                    ->image()
                    ->directory('AlurPendaftaran')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048) // 2MB
                    ->preserveFilenames()
                    ->visibility('public')
                    ->previewable(false) // Nonaktifkan preview agar tidak terus loading
                    ->nullable()
                    ->required(),
                FileUpload::make('brosur')
                    ->image()
                    ->directory('brosur')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048) // 2MB
                    ->preserveFilenames()
                    ->visibility('public')
                    ->previewable(false) // Nonaktifkan preview agar tidak terus loading
                    ->nullable()
                    ->required(),
                RichEditor::make('syarat_pendaftaran')
                ->required()
                ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'bulletList', 'orderedList', 'blockquote',
                        'link', 'undo', 'redo',
                    ]),
                Textinput::make('link_paketA')->required(),
                Textinput::make('link_paketB')->required(),
                Textinput::make('link_paketC')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('alur_pendaftaran')
                    ->width(100)
                    ->url(fn ($record) => $record->AlurPendaftaran ? asset('storage/' . $record->AlurPendaftaran) : null)
                    ->disk('public'),
                Tables\Columns\ImageColumn::make('brosur')
                    ->width(100)
                    ->url(fn ($record) => $record->brosur ? asset('storage/' . $record->brosur) : null)
                    ->disk('public'),
                Tables\Columns\TextColumn::make('syarat_pendaftaran')->html(),
                Tables\Columns\TextColumn::make('link_paketA'),
                Tables\Columns\TextColumn::make('link_paketB'),
                Tables\Columns\TextColumn::make('link_paketC'),
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
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}
