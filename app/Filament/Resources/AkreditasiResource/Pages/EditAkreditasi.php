<?php

namespace App\Filament\Resources\AkreditasiResource\Pages;

use App\Filament\Resources\AkreditasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAkreditasi extends EditRecord
{
    protected static string $resource = AkreditasiResource::class;

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
