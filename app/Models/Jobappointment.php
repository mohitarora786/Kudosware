<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobappointment extends Model
{
    use HasFactory;
    protected $table = 'jobappointments';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'image',
        'job_role',
          'status'
    ];
}
