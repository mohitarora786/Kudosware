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
        // Validate common fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'subject' => 'required|string',
            'message' => 'nullable|string',
            'service_type' => 'nullable|string',
            'technology' => 'nullable|string',
            'job_role' => 'nullable|string', // Validate job_role for career
            'file' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust file types and size as needed
        ]);
    
        $data = $request->only(['name', 'email', 'phone', 'subject', 'message', 'service_type', 'technology', 'job_role']);
    
        // Handle file upload for career subject
        if ($request->subject === 'career') {
            // Fetch the job ID from the jobs table using the job_role
            $job = Job::where('job_title', $request->job_role)->first();
    
            if (!$job) {
                return redirect()->back()->withErrors(['job_role' => 'Invalid job role selected.']);
            }
    
            $data['job_id'] = $job->id;
    
            // Handle file upload if file is present
            if ($request->hasFile('file')) {
                $fileName = time() . '.' . $request->file->extension();
                $request->file->move(public_path('uploads'), $fileName);
                $data['image'] = $fileName;
            }
    
            // Set additional fields specific to the job appointment
            $data['status'] = 'pending';
    
            // Store in jobappointments table
            JobAppointment::create($data);
        } elseif ($request->subject === 'quote') {
            Enquiry::create($data);
        } elseif ($request->subject === 'message') {
            Feedback::create($data);
        }
    
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
    }
