<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Filament\Resources\AlumniResource\RelationManagers;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumniImport;


class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Alumni';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_alumni')
                ->required(),
                Select::make('tahun_lulus')->label('Tahun Lulus')->options(collect(range(now()->year, 2010))
                ->mapWithKeys(fn ($year) => [$year => $year])
                ->toArray())
                ->disableOptionWhen(fn(string$value): bool=> $value === '') //nonaktifkan opsi kosong 
                ->required()
                ->native(false),

                Select::make('program')->label('Program Pendidikan')->options([
                    'Paket A' => 'Paket A',
                    'Paket B' => 'Paket B',
                    'Paket C' => 'Paket C',
                ])
                ->disableOptionWhen(fn(string$value): bool=> $value === '') //nonaktifkan opsi kosong 
                ->required()
                ->native(false),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('nama_alumni')->label('Nama Alumni')->searchable() ->formatStateUsing(fn ($state) => ucwords(strtolower($state))),

            TextColumn::make('program')
                ->label('Program')
                ->formatStateUsing(fn ($state) => match($state) {
                    'Paket A' => 'Paket A',
                    'Paket B' => 'Paket B',
                    'Paket C' => 'Paket C',
                    default => '-',
                })
                ->sortable(),

            TextColumn::make('tahun_lulus')
                ->label('Tahun Lulus')
                ->sortable(),
            ])
            ->headerActions([
            Action::make('import')
                ->label('Import Excel')
                ->form([
                    FileUpload::make('file')
                        ->label('Pilih File Excel')
                        ->acceptedFileTypes([
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-excel',
                            'text/csv'
                        ])
                        ->required(),
                ])
                ->action(function (array $data) {
                    Excel::import(new AlumniImport, $data['file']);
                    Notification::make()
                        ->title('Berhasil')
                        ->body('Data alumni berhasil diimpor.')
                        ->success()
                        ->send();
                })
                ->modalHeading('Upload Data Alumni')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('success'),
        ])
            ->filters([
                Tables\Filters\SelectFilter::make('program')
                ->label('Program')
                ->options([
                    'Paket A' => 'Paket A',
                    'Paket B' => 'Paket B',
                    'Paket C' => 'Paket C',
                ]),

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
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}
