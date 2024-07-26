<?php

namespace App\Filament\Resources\JobappointmentResource\Widgets;

use App\Models\Jobappointment;
use Illuminate\Support\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class JobapplicantOverview extends BaseWidget
{
        protected static ? int $sort=1;
        protected function getStats(): array
        {
            // Get current month and year
            $currentMonth = Carbon::now()->format('F'); // Full month name, e.g., "January"
            $currentYear = Carbon::now()->year; // Current year, e.g., "2024"
        
            // Calculate counts
            $totalApplications = Jobappointment::count();
            $applicationsThisMonth = Jobappointment::whereMonth('created_at', Carbon::now()->month)->count();
            $applicationsThisYear = Jobappointment::whereYear('created_at', $currentYear)->count();
        
            return [
                Stat::make('Total Applications Till Now', $totalApplications),
        
                Stat::make("Total Applications $currentMonth Month ", $applicationsThisMonth),
        
                Stat::make("Total Applications $currentYear Year", $applicationsThisYear),
            ];
        }
}
