<?php

namespace App\Filament\Resources\UlasanResource\Pages;

use App\Filament\Resources\UlasanResource;
use Filament\Resources\Pages\ListRecords;

class ListUlasans extends ListRecords
{
    protected static string $resource = UlasanResource::class;

    protected function getHeaderActions(): array
    {
        return []; // Hilangkan tombol "Create"
    }

    public function mount(): void
    {
        parent::mount();

        // Tandai semua ulasan sebagai sudah dibaca
        \App\Models\Ulasan::where('is_read', false)->update(['is_read' => true]);
    }
}
