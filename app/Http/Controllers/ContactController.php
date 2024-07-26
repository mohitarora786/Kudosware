<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Feedback;
use App\Models\Jobappointment;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'nullable|string',
            'file' => 'nullable|file|max:2048', // Adjust max size as needed
            'job_role' => 'nullable|string|max:255', // Only for job applications
        ]);

        // Determine which model to use based on the subject
        if ($request->subject === 'quote' || $request->subject === 'message') {
            Feedback::create($validated);
        } elseif ($request->subject === 'career') {
            // Handle file upload
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('job_applications', 'public');
                $validated['file'] = $filePath;
            }
            Jobappointment::create($validated);
        } else {
            Enquiry::create($validated);
        }

        // Redirect or return a response
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
