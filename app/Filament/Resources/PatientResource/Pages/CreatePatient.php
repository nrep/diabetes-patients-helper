<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\PatientDisease;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;
    //redirect to the patient list page after creating a patient
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    
    protected function afterCreate(): void
    {
        $patient = $this->record; // Get this created patient 
        $data = $this->form->getState(); // Get the submitted form data
        //dd($data['disease_id']);
        if (!empty($data['disease_id'])) {           
           
                PatientDisease::create([
                    'patient_id' => $patient->id, // Get the saved property ID and save it as a foreign key
                    'disease_id' => $data['disease_id'],
                    'diagnosed_at' => $data['diagnosed_at'],
                    'notes' => $data['notes'],
                ]);
            
        }
    }
}
