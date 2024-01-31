<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'tbl_attendance'; // Specify the table name if it's different from the model name

    protected $fillable = [
        'employee_id',
        'attendance_date',
        'checkin_time',
        'checkout_time',
        // Add more columns as needed
    ];
}
