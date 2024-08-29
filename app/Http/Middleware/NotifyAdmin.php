<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotifyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            // Check if the notification has already been shown in this session
            if (!$request->session()->has('admin_notified')) {
                // Trigger the notification with the admin's name
                Notification::make()
                    ->title('Welcome Back, ' . auth()->user()->name . '!')
                    ->body('Here’s what’s new since your last visit.')
                    ->success()
                    ->send();

                // Store in session that the notification has been shown
                $request->session()->put('admin_notified', true);
            }
        }

        return $next($request);
    }
}
