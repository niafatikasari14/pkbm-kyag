<?php

namespace App\Filament\Resources\OrganisasiStrukturResource\Pages;

use App\Filament\Resources\OrganisasiStrukturResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganisasiStruktur extends CreateRecord
{
    protected static string $resource = OrganisasiStrukturResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
