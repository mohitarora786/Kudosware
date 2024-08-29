<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Feedback;
use App\Models\Job;
use App\Models\Jobappointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function store(Request $request)
{
    // Common validation rules
    $commonRules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'subject' => 'required|string',
    ];

    // Validate based on subject
    switch ($request->input('subject')) {
        case 'career':
            // Validation for career
            $validatedData = $request->validate(array_merge($commonRules, [
                'job_role' => 'required|string|max:255',
                'cv_link' => 'nullable|url', // Validate Google Drive link
            ]));

            // Ensure 'job_id' is set based on job_role
            $jobRole = $request->input('job_role');
            $job = Job::where('job_title', $jobRole)->first();

            if ($job) {
                $validatedData['job_id'] = $job->id;
            } else {
                return redirect()->back()->with('error', 'Invalid job role selected.');
            }

            // Check for existing requests within the last 24 hours
            $existingRequest = Jobappointment::where('job_id', $job->id)
                ->where('email', $request->input('email'))
                ->where('phone', $request->input('phone'))
                ->where('created_at', '>=', now()->subDay())
                ->first();

            if ($existingRequest) {
                return redirect()->back()->with('error', 'You have already submitted a request within the last 24 hours.');
            }

            // Set 'status' for the career
            $validatedData['status'] = 'pending'; // Example status

            // Handle Google Drive link
            if ($request->filled('cv_link')) {
                $validatedData['image'] = $request->input('cv_link');
            } else {
                $validatedData['image'] = null; // or 'default_image.jpg' if you want a default value
            }

            // Store in Jobappointment model
            Jobappointment::create($validatedData);

            // Pass success message
            return redirect()->back()->with('success', 'Your career application has been submitted successfully!');
            break;

        case 'message':
            // Validation for message
            $validatedData = $request->validate(array_merge($commonRules, [
                'message' => 'required|string',
                'service_type' => 'nullable|string',
                'technology' => 'nullable|string',
            ]));

            // Check for existing requests within the last 24 hours
            $existingRequest = Feedback::where('email', $request->input('email'))
                ->where('phone', $request->input('phone'))
                ->where('created_at', '>=', now()->subDay())
                ->first();

            if ($existingRequest) {
                return redirect()->back()->with('error', 'You have already sent a message within the last 24 hours.');
            }

            // Store in Feedback model
            Feedback::create($validatedData);

            // Pass success message
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
            break;

        case 'quote':
            // Validation for quote
            $validatedData = $request->validate(array_merge($commonRules, [
                'message' => 'nullable|string',
                'service_type' => 'required|string',
                'technology' => 'required|string',
            ]));

            // Check for existing requests within the last 24 hours
            $existingRequest = Enquiry::where('email', $request->input('email'))
                ->where('phone', $request->input('phone'))
                ->where('created_at', '>=', now()->subDay())
                ->first();

            if ($existingRequest) {
                return redirect()->back()->with('error', 'You have already submitted a quote request within the last 24 hours.');
            }

            // Store in Enquiry model
            Enquiry::create($validatedData);

            // Pass success message
            return redirect()->back()->with('success', 'Your quote request has been submitted successfully!');
            break;

        default:
            return redirect()->back()->with('error', 'Invalid subject selected.');
    }
}

    
    }