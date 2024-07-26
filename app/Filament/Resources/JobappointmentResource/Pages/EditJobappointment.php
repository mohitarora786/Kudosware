<?php

namespace App\Filament\Resources\JobappointmentResource\Pages;

use App\Filament\Resources\JobappointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobappointment extends EditRecord
{
    protected static string $resource = JobappointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
