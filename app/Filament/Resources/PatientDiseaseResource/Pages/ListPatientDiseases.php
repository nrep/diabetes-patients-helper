<?php

namespace App\Filament\Resources\PatientDiseaseResource\Pages;

use App\Filament\Resources\PatientDiseaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatientDiseases extends ListRecords
{
    protected static string $resource = PatientDiseaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
