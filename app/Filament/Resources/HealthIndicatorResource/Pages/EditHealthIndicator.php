<?php

namespace App\Filament\Resources\HealthIndicatorResource\Pages;

use App\Filament\Resources\HealthIndicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHealthIndicator extends EditRecord
{
    protected static string $resource = HealthIndicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
