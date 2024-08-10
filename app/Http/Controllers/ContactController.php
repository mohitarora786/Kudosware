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
                    'file' => 'nullable|file|mimes:jpg,png,pdf|max:2048', // Validating file
                ]));

                // Ensure 'job_id' is set based on job_role
                $jobRole = $request->input('job_role');
                $job = Job::where('job_title', $jobRole)->first();

                if ($job) {
                    $validatedData['job_id'] = $job->id;
                } else {
                    return redirect()->back()->with('error', 'Invalid job role selected.');
                }

                // Handle file upload
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('uploads', $fileName, 'public');
                    $validatedData['image'] = $fileName;
                }
    

                // Set 'status' for the career
                $validatedData['status'] = 'pending'; // Example status

                // Store in Career model
                Jobappointment::create($validatedData);
                break;

            case 'message':
                // Validation for message
                $validatedData = $request->validate(array_merge($commonRules, [
                    'message' => 'required|string',
                    'service_type' => 'nullable|string',
                    'technology' => 'nullable|string',
                ]));

                // Store in Feedback model
                Feedback::create($validatedData);
                break;

            case 'quote':
                // Validation for quote
                $validatedData = $request->validate(array_merge($commonRules, [
                    'message' => 'nullable|string',
                    'service_type' => 'required|string',
                    'technology' => 'required|string',
                ]));

                // Store in Enquiry model
                Enquiry::create($validatedData);
                break;

            default:
                return redirect()->back()->with('error', 'Invalid subject selected.');
        }

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    }