<?php

namespace App\Filament\Resources;

use App\Models\Ulasan;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class UlasanResource extends Resource
{
    protected static ?string $model = Ulasan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Ulasan Pengunjung';
    protected static ?string $navigationGroup = 'Konten';

    public static function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form->schema([]); // Tidak bisa input lewat dashboard
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')->searchable(),
                TextColumn::make('telp')->label('Telepon'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('kritik_saran')->label('Kritik & Saran')->wrap()->limit(80),
                TextColumn::make('created_at')->label('Tanggal')->dateTime('d M Y H:i')->sortable(),
            ])
            ->actions([]) // Tidak bisa edit/hapus
            ->bulkActions([]); // Tidak bisa hapus massal
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\UlasanResource\Pages\ListUlasans::route('/'),
        ];
    }

    // ✅ Tambahkan ini untuk menampilkan badge jumlah ulasan baru
    public static function getNavigationBadge(): ?string
    {
        return (string) Ulasan::where('is_read', false)->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger'; // warna merah
    }
}
