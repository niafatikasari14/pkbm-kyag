<?php

namespace App\Filament\Resources\OrganisasiStrukturResource\Pages;

use App\Filament\Resources\OrganisasiStrukturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrganisasiStrukturs extends ListRecords
{
    protected static string $resource = OrganisasiStrukturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
