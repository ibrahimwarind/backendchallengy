<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendanceImport;

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
}
