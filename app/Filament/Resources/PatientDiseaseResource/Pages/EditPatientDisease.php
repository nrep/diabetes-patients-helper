<?php

namespace App\Filament\Resources\PatientDiseaseResource\Pages;

use App\Filament\Resources\PatientDiseaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPatientDisease extends EditRecord
{
    protected static string $resource = PatientDiseaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
