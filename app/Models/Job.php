<?php

namespace App\Models;

use Doctrine\DBAL\Schema\Schema;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'salary',
        'tenure',
        'job_domain',
        'job_location',
    ];

    public function jobappointments()
    {
        return $this->hasMany(Jobappointment::class);
    }
}
