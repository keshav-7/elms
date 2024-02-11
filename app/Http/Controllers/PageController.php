<?php

namespace App\Http\Controllers;
use App\Models\LeaveType;
use Redirect;
use Session;
use DB;
use Carbon\Carbon;

class PageController extends Controller
{
    // Assuming these constants for leave types
    const PL = 'PL';
    const CL = 'CL';
    const SL = 'SL';
    
    // Define maximum leave balances (dynamic with potential future updates)
    const MAX_PL_BALANCE = 12;
    const MAX_CL_BALANCE = 2;
    const MAX_SL_BALANCE = 4;

  public function ViewLoginPageController(){
    return view("login-page");
  }

  public function ViewHomePageController()
  {
    $session_type  = Session::get('Session_Type'); 
    if($session_type == "Admin")
    {
      $pending_data = (new LeaveType)->getLeaveRequests();
      $leave_type   = DB::table('leave_type')->value('leave_type_name');     
      $leave_type   = DB::table('leave_type')->groupBy('leave_type_name','id')->select('id','leave_type_name', \DB::raw('COUNT(*) as cnt'))->get();
      // dd($pending_data);
      return view("admin-dashboard-content/home-page")->with(["pending_data"=> $pending_data,"leave_type"=>$leave_type]);
    } else if($session_type == "Staff")
    {       
      return view("404_error");
    } else
    {
      return Redirect::to("/");
    }
  }

  public function ViewHomePageOfStaffAccountController(){
    $session_type = Session::get('Session_Type');
    // dd($session_type);
    if($session_type == "Staff"){
      $session_value = Session::get('Session_Value');
      $staff_basic_data = DB::table('staff_data')->select("firstname", "lastname", "joining_date")->where(["staff_id" => $session_value])->get();
      // dd($staff_basic_data);
      // $joiningDate = Carbon::createFromDate($staff_basic_data[0]->joining_date);        
      // $pp = $this->calculateLeaveBalances($joiningDate);
      // dd($pp);
      $leave_pending_data = DB::table('leave_data')->where(["staff_id" => $session_value, "approval_status" => '0'])->orderBy('leave_date', 'ASC')->get();
      $username = DB::table('user_account')->select("username")->where(["staff_id" => $session_value])->get();
      $leave_data = DB::table('leave_data')->where(["staff_id" => $session_value])->where(["approval_status" => '1'])->orWhere("approval_status", '0')->orderBy('request_date', 'DESC')->get();    
      $leave_type=DB::table('leave_type')->get(); 
      $leave_count=DB::table('leave_data')->where(["approval_status" => "1"])->orWhere("approval_status", '0')->where(["staff_id" => $session_value])->select('leave_type', DB::raw('count(*) as total'))->groupBy('leave_type')->get();
      // dd('leave_type: ', $leave_type, 'leave_count: ', $leave_count);
      return view("staff-dashboard-content/home-page-index")->with(['leave_count'=>$leave_count,'staff_basic_data' => $staff_basic_data,"leave_type"=>$leave_type,"leave_data" => $leave_data, "username" => $username, "leave_pending_data" => $leave_pending_data]);
    } else
    {
      return Redirect::to("/");
    }
  }

  private function calculateLeaveBalances($joinDate, $year = null) {

    list($startOfSession, $endOfSession) = $this->getSessionDate($year);

    $currentDate = Carbon::now();
    $daysInYear = $startOfSession->diffInDays($endOfSession) + 1; // Account for leap years

    $monthsSinceJoin = $joinDate->diffInMonths($endOfSession);
    $quartersSinceJoin = $joinDate->diffInQuarters($endOfSession);

    $totalDays = $joinDate->diffInDays($currentDate);

    // Retrieve accrual rates for the session
    $accrualRates = $this->getAccrualRates($year);

    // Calculate adjusted months for PL accrual if joining on 1st of the month
    $adjustedMonthsForPL = $joinDate->day === 1 ? $monthsSinceJoin : $monthsSinceJoin + 0.5;

    // Calculate leave balances
    $plBalance = min($adjustedMonthsForPL * $accrualRates[self::PL], self::MAX_PL_BALANCE);
    $clBalance = min(floor($monthsSinceJoin / 6) * $accrualRates[self::CL], self::MAX_CL_BALANCE);
    $slBalance = min($quartersSinceJoin * $accrualRates[self::SL], self::MAX_SL_BALANCE);

    // Adjust for pro-rata accrual for CL and SL based on remaining days in the month
    if ($joinDate->day > 1 && $joinDate->day <= 15) {
        $remainingDaysInMonth = $joinDate->endOfMonth()->diffInDays($joinDate);
        $clBalance += ($remainingDaysInMonth / 30) * $accrualRates[self::CL];
        $slBalance += ($remainingDaysInMonth / 30) * $accrualRates[self::SL];
    } else if ($totalDays % 30 > 15) {
        $clBalance += 0.25 * $accrualRates[self::CL];
        $slBalance += 0.5 * $accrualRates[self::SL];
    }

    return [
      self::PL => $plBalance,
      self::CL => $clBalance,
      self::SL => $slBalance,
    ];
  }
  
  private function getSessionDate($year = null) {
    $year = $year ?: Carbon::now()->year; // Default to current year
    return [
        Carbon::createFromDate($year, 4, 1),
        Carbon::createFromDate($year + 1, 3, 31), // Account for leap years
    ];
  }

  private function getAccrualRates($year = null) {
    $year = $year ?: Carbon::now()->year;
    return [
        self::PL => 1,
        self::CL => 0.5,
        self::SL => 0.25,
    ];
  }
  
  public function ViewStaffManagementIndexController(){

    $session_type = Session::get('Session_Type');

    if($session_type == "Admin"){

      $staff_data = DB::table('staff_data')->select('auto_id', 'staff_id', 'firstname', 'lastname', 'joining_date', 'email', 'phone_number', 'position')->get(); // Get staff data.
      return view("admin-dashboard-content/staff-management-page-1-index")->with('staff_data', $staff_data); //Send staff data with it.

    }else{

      return Redirect::to("/");

    }

}  

}
