<?php

namespace App\Filament\Resources\JobappointmentResource\Pages;

use App\Filament\Resources\JobappointmentResource;
use App\Filament\Resources\JobappointmentResource\Widgets\JobapplicantOverview;
use App\Filament\Resources\JobappointmentResource\Widgets\JobapplicantsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListJobappointments extends ListRecords
{
    protected static string $resource = JobappointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return[
        JobapplicantOverview::class,
        JobapplicantsOverview::class
        ];
    }
    public function getTabs(): array
    {
        return [
            Tab::make('All Applications')->query(fn($query) => $query),
            Tab::make('Accepted Applications')->query(fn($query) => $query->where('status', 'Accepted')),
            Tab::make('Pending Applications')->query(fn($query) => $query->where('status', 'Pending')),
            Tab::make('Rejected Applications')->query(fn($query) => $query->where('status', 'Rejected')),
        ];
    }
}
