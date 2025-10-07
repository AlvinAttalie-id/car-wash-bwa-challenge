<?php

namespace App\Filament\Resources\CarWashTypes\Pages;

use App\Filament\Resources\CarWashTypes\CarWashTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCarWashType extends ViewRecord
{
    protected static string $resource = CarWashTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
