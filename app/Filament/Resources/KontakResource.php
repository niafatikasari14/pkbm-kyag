<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Filament\Resources\KontakResource\RelationManagers;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textinput::make('alamat')->label('Alamat')->required(),
                Forms\Components\Textinput::make('no_telp')->label('No.Telp')->required(),
                Forms\Components\Textinput::make('email')->label('Email')->required(),
                Forms\Components\Textinput::make('watsapp')->label('WhatsApp')->required(),
                Forms\Components\Textinput::make('instagram')->label('Instagram')->required(),
                Forms\Components\Textinput::make('website')->label('website')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('no_telp'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('watsapp'),
                Tables\Columns\TextColumn::make('instagram'),
                Tables\Columns\TextColumn::make('website'),
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
            'index' => Pages\ListKontaks::route('/'),
            'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}
