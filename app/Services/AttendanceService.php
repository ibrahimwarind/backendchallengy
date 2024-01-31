<?php 
namespace App\Services;

use App\Models\Attendance;

class AttendanceService
{
    public function getAttendanceInfo($employeeId)
    {
        
        $attendance = new Attendance();
        $attendance->employee_id = $employeeId;
        $attendance->checkin_time = '08:00:00';
        $attendance->checkout_time = '17:00:00';

        return $attendance;
    }
}
?>