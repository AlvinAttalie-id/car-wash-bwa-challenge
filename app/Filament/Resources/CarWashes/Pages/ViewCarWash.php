<?php

namespace App\Filament\Resources\CarWashes\Pages;

use App\Filament\Resources\CarWashes\CarWashResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCarWash extends ViewRecord
{
    protected static string $resource = CarWashResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
