<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function leaveApplications()
    {
        return $this->hasMany(LeaveApplication::class);
    }   
}
