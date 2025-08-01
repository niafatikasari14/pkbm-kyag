<?php

namespace App\Filament\Resources\SaranaPrasaranaResource\Pages;

use App\Filament\Resources\SaranaPrasaranaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSaranaPrasarana extends EditRecord
{
    protected static string $resource = SaranaPrasaranaResource::class;

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
