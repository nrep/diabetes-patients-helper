<?php

namespace App\Filament\Resources\DietaryPlanResource\Pages;

use App\Filament\Resources\DietaryPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDietaryPlan extends EditRecord
{
    protected static string $resource = DietaryPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
