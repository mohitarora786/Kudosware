<?php

namespace App\Filament\Widgets;

use App\Models\Jobappointment;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class JobsApplications extends ChartWidget
{
    protected static ?string $heading = 'Number of Job Appointments by Role';
    protected static ?int $sort = 2;

    protected function getData(): array
{
    // Query to get the count of each job role
    try {
        $jobRoleData = Jobappointment::select('job_role', DB::raw('COUNT(*) as role_count'))
            ->groupBy('job_role')
            ->get();
    } catch (\Exception $e) {
        // Handle potential database errors
        $jobRoleData = collect();
    }

    // Initialize arrays to store job roles and their counts
    $jobRoles = [];
    $roleCounts = [];

    // Define a set of colors for the chart
    $colors = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(199, 199, 199, 0.2)',
        'rgba(83, 102, 255, 0.2)',
        'rgba(255, 99, 71, 0.2)',
        'rgba(124, 252, 0, 0.2)',
        'rgba(255, 165, 0, 0.2)',
        'rgba(139, 69, 19, 0.2)',
        'rgba(0, 255, 255, 0.2)',
        'rgba(255, 105, 180, 0.2)',
        'rgba(128, 0, 128, 0.2)',
        'rgba(255, 69, 0, 0.2)',
        'rgba(50, 205, 50, 0.2)',
        'rgba(255, 215, 0, 0.2)',
        'rgba(0, 0, 255, 0.2)',
        'rgba(0, 255, 0, 0.2)',
    ];

    // Prepare arrays for colors
    $backgroundColors = [];
    $borderColors = [];

    // Process the query results and assign colors
    foreach ($jobRoleData as $index => $data) {
        $jobRoles[] = $data->job_role;
        $roleCounts[] = $data->role_count;
        $backgroundColors[] = $colors[$index % count($colors)];
        $borderColors[] = str_replace('0.2', '1', $colors[$index % count($colors)]);
    }

    return [
        'datasets' => [
            [
                'label' => 'Number of Job Appointments by Role',
                'data' => $roleCounts,
                'backgroundColor' => $backgroundColors,
                'borderColor' => $borderColors,
                'borderWidth' => 1,
            ],
        ],
        'labels' => $jobRoles,
    ];
}
    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
            'aspectRatio' => 0.7, // Adjust aspect ratio to control height
            'plugins' => [
                'legend' => [
                    'display' => false, // Disable legend display
                ],
                'tooltip' => [
                    'enabled' => true, // Enable tooltips to show city names on hover
                ],
            ],
        ];
    }
    protected function getType(): string
    {
        return 'pie';
    }
}
