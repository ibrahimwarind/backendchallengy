<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendanceImport;
use App\Services\AttendanceService;

class AttendanceController extends Controller
{
    //
    public function uploadAttendance(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048',
        ]);

        $file = $request->file('file');

        // Use Laravel Excel to import data from the Excel file
        Excel::import(new AttendanceImport, $file);

        return response()->json(['message' => 'Attendance data uploaded successfully']);
    }

    private $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function getAttendanceInfo2($employeeId)
    {
        $attendance = $this->attendanceService->getAttendanceInfo($employeeId);

        return response()->json([
            'employee_id' => $attendance->employee_id,
            'checkin_time' => $attendance->checkin_time,
            'checkout_time' => $attendance->checkout_time,
            
        ]);
    }
}
