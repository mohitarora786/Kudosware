<?php

namespace App\Filament\Resources\FeedbackResource\Pages;

use App\Filament\Resources\FeedbackResource;
use App\Filament\Resources\FeedbackResource\Widgets\FeedbackOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
class ListFeedback extends ListRecords
{
    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return[
        FeedbackOverview::class,
        ];
    }
    public function getTabs(): array
    {
        $currentWeek = now()->format('W'); // Get the current week number
        $currentMonth = now()->format('F Y'); // Get the current month and year (e.g., 'August 2024')
        $currentYear = now()->format('Y'); // Get the current year (e.g., '2024')
    
        return [
            // Tab to show all feedbacks
            Tab::make('All Feedbacks')
                ->query(fn($query) => $query)
                ->label('All Feedbacks'),
    
            // Tab to show feedbacks from the current week
            Tab::make("Week $currentWeek Feedbacks")
                ->query(fn($query) => $query
                    ->whereBetween('created_at', [
                        now()->startOfWeek(), 
                        now()->endOfWeek()
                    ])
                )
                ->label("Week $currentWeek Feedbacks"),
    
            // Tab to show feedbacks from the current month
            Tab::make("Month $currentMonth Feedbacks")
                ->query(fn($query) => $query
                    ->whereBetween('created_at', [
                        now()->startOfMonth(), 
                        now()->endOfMonth()
                    ])
                )
                ->label("Month $currentMonth Feedbacks"),
    
            // Tab to show feedbacks from the current year
            Tab::make("Year $currentYear Feedbacks")
                ->query(fn($query) => $query
                    ->whereBetween('created_at', [
                        now()->startOfYear(), 
                        now()->endOfYear()
                    ])
                )
                ->label("Year $currentYear Feedbacks"),
        ];
    }
    
}
