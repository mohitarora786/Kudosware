<?php

namespace App\Filament\Resources\JobappointmentResource\Widgets;
use Illuminate\Support\Carbon;
use App\Models\Jobappointment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class JobapplicantsOverview extends BaseWidget
{
    protected static ? int $sort=2;
    protected function getStats(): array
{
    // Get current month and year
    $currentMonth = Carbon::now()->format('F'); // Full month name, e.g., "January"
    $currentYear = Carbon::now()->year; // Current year, e.g., "2024"

    // Calculate counts by status
    $acceptedTotal = Jobappointment::where('status', 'Accepted')->count();
    $pendingTotal = Jobappointment::where('status', 'Pending')->count();
    $rejectedTotal = Jobappointment::where('status', 'Rejected')->count();
    
    $acceptedThisMonth = Jobappointment::where('status', 'Accepted')
        ->whereMonth('created_at', Carbon::now()->month)
        ->count();
    $pendingThisMonth = Jobappointment::where('status', 'Pending')
        ->whereMonth('created_at', Carbon::now()->month)
        ->count();
    $rejectedThisMonth = Jobappointment::where('status', 'Rejected')
        ->whereMonth('created_at', Carbon::now()->month)
        ->count();

    $acceptedThisYear = Jobappointment::where('status', 'Accepted')
        ->whereYear('created_at', $currentYear)
        ->count();
    $pendingThisYear = Jobappointment::where('status', 'Pending')
        ->whereYear('created_at', $currentYear)
        ->count();
    $rejectedThisYear = Jobappointment::where('status', 'Rejected')
        ->whereYear('created_at', $currentYear)
        ->count();

    return [
        Stat::make('Total Accepted Applications', $acceptedTotal),
        Stat::make('Total Pending Applications', $pendingTotal),
        Stat::make('Total Rejected Applications', $rejectedTotal),

        // Stat::make("Accepted Applications $currentMonth", $acceptedThisMonth),
        // // Stat::make("Pending Applications $currentMonth", $pendingThisMonth),
        // // Stat::make("Rejected Applications $currentMonth", $rejectedThisMonth),

        // Stat::make("Accepted Applications $currentYear", $acceptedThisYear),
        // // Stat::make("Pending Applications $currentYear", $pendingThisYear),
        // // Stat::make("Rejected Applications $currentYear", $rejectedThisYear),
    ];
}

}
