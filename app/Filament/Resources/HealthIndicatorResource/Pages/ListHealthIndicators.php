<?php

namespace App\Filament\Resources\HealthIndicatorResource\Pages;

use App\Filament\Resources\HealthIndicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHealthIndicators extends ListRecords
{
    protected static string $resource = HealthIndicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
