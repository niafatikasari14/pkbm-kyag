<?php

namespace App\Filament\Resources\PendaftaranResource\Pages;

use App\Filament\Resources\PendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendaftaran extends EditRecord
{
    protected static string $resource = PendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
        // ⬇️ Tambahkan method ini agar redirect ke list setelah simpan
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
