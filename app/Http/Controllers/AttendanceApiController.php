<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceApiController extends Controller
{
    
    public function getAttendanceInfo($employee_id)
    {

        $attendances = Attendance::where('employee_id', $employee_id)->get();

        $totalWorkingHours = $attendances->sum(function ($attendance) {
            $checkin = \Carbon\Carbon::parse($attendance->checkin_time);
            $checkout = \Carbon\Carbon::parse($attendance->checkout_time);
            return $checkout->diffInHours($checkin);
        });

        return response()->json([
            'employee_id' => $employee_id,
            'attendances' => $attendances,
            'total_working_hours' => $totalWorkingHours,
        ]);
    }
}
