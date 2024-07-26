<?php

namespace App\Filament\Resources\EnquiryResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class EnquiryOverview extends BaseWidget
{
    

protected static ?int $sort = 1;

protected function getStats(): array
{
    // Get current month and year
    $currentMonth = Carbon::now()->format('F'); // Full month name, e.g., "January"
    $currentYear = Carbon::now()->year; // Current year, e.g., "2024"

    // Calculate counts
    $totalEnquiries = DB::table('enquiries')->count();
    $enquiriesThisMonth = DB::table('enquiries')
        ->whereMonth('created_at', Carbon::now()->month)
        ->count();
    $enquiriesThisYear = DB::table('enquiries')
        ->whereYear('created_at', $currentYear)
        ->count();

    return [
        Stat::make('Total Enquiries Till Now', $totalEnquiries),

        Stat::make("Total Enquiries for $currentMonth", $enquiriesThisMonth),

        Stat::make("Total Enquiries for $currentYear", $enquiriesThisYear),
    ];
}

}
