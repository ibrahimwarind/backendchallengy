<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Attendance;

class AttendanceImport implements ToModel
{
    public function model(array $row)
    {
        return new Attendance([
            'employee_id' => $row[0], 
            'attendance_date' => $row[1],
            'checkin_time' => $row[2], 
            'checkout_time' => $row[3],
        ]);
    }
}
