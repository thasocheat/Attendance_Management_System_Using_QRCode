<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id', 'student_id', 'enrollment_date'
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_classes', 'student_class_id', 'class_id');
    }


    /**
     * Create attendance records for the student.
     */
    public function createAttendanceRecords(): void
    {
        $startDate = Carbon::parse($this->enrollment_date);
        $endDate = Carbon::now();

        // Create attendance records for each day from enrollment date until now
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            Attendance::create([
                'student_class_id' => $this->id,
                'date' => $date,
                'status' => 'absent', // Set default status as absent
                // Add any other required fields here
            ]);
        }
    }
}
