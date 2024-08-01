<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobappointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'job_role',
        'image',
        'status',
        'job_id', // Ensure job_id is fillable
    ];

    // Define the relationship with Job
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
