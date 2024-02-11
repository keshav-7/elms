<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class LeaveType extends Model
{
    use HasFactory;
    
    public function getLeaveRequests() : ?object
    {
        $query = DB::table('leave_data')
        ->select('leave_data.staff_id', 'staff_data.auto_id', 'leave_data.leave_type', 'leave_data.leave_date', 'leave_data.request_date', 'leave_data.description', 'leave_data.approval_status', 'staff_data.firstname', 'staff_data.lastname')
        ->join('staff_data', 'leave_data.staff_id', '=', 'staff_data.staff_id', 'left')
        ->where('leave_data.approval_status', '0')
        ->orderBy('leave_data.request_date', 'ASC');
        // echo $query->toSql();die();
        return $query->get();
    }
}
