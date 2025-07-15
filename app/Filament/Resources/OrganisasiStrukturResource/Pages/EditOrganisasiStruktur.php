<?php

namespace App\Filament\Resources\OrganisasiStrukturResource\Pages;

use App\Filament\Resources\OrganisasiStrukturResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganisasiStruktur extends EditRecord
{
    protected static string $resource = OrganisasiStrukturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
      protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
