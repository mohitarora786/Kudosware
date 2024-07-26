<?php

namespace App\Filament\Resources\FeedbackResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class FeedbackOverview extends BaseWidget
{
   

    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        // Get current month and year
        $currentMonth = Carbon::now()->format('F'); // Full month name, e.g., "January"
        $currentYear = Carbon::now()->year; // Current year, e.g., "2024"
    
        // Calculate counts
        $totalFeedback = DB::table('feedback')->count();
        $feedbackThisMonth = DB::table('feedback')
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $feedbackThisYear = DB::table('feedback')
            ->whereYear('created_at', $currentYear)
            ->count();
    
        return [
            Stat::make('Total Feedback Till Now', $totalFeedback),
    
            Stat::make("Total Feedback for $currentMonth", $feedbackThisMonth),
    
            Stat::make("Total Feedback for $currentYear", $feedbackThisYear),
        ];
    }
    
}
