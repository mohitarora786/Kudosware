<?php

namespace App\Filament\Resources\EnquiryResource\Pages;

use App\Filament\Resources\EnquiryResource;
use App\Filament\Resources\EnquiryResource\Widgets\EnquiryOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListEnquiries extends ListRecords
{
    protected static string $resource = EnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return[
        EnquiryOverview::class,
        ];
    }
    public function getTabs(): array
{
    $currentWeek = now()->format('W'); // Current week number
    $currentMonth = now()->format('F Y'); // Current month and year (e.g., 'August 2024')
    $currentYear = now()->format('Y'); // Current year (e.g., '2024')

    return [
        // Tab to show all enquiries
        Tab::make('All Enquiries')
            ->query(fn($query) => $query)
            ->label('All Enquiries'),

        // Tab to show enquiries from the current week
        Tab::make("Week $currentWeek Enquiries")
            ->query(fn($query) => $query
                ->whereBetween('created_at', [
                    now()->startOfWeek(), 
                    now()->endOfWeek()
                ])
            )
            ->label("Week $currentWeek Enquiries"),

        // Tab to show enquiries from the current month
        Tab::make("Month $currentMonth Enquiries")
            ->query(fn($query) => $query
                ->whereBetween('created_at', [
                    now()->startOfMonth(), 
                    now()->endOfMonth()
                ])
            )
            ->label("Month $currentMonth Enquiries"),

        // Tab to show enquiries from the current year
        Tab::make("Year $currentYear Enquiries")
            ->query(fn($query) => $query
                ->whereBetween('created_at', [
                    now()->startOfYear(), 
                    now()->endOfYear()
                ])
            )
            ->label("Year $currentYear Enquiries"),
    ];
}

}
