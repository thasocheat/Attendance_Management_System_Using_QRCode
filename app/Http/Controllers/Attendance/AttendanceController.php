<?php

namespace App\Http\Controllers\Attendance;

use App\Models\User;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        // Get all classes, teachers, and subjects for the filter form
        $classes = ClassModel::all();
        $teachers = User::where('role', 'teacher')->get();
        $subjects = Subject::all();

        // Initialize the query builder for attendance
        $attendanceQuery = Attendance::query();

        // Filter based on the selected class, teacher, and subject
        if ($request->has('class_id')) {
            $attendanceQuery->whereHas('studentClass', function ($query) use ($request) {
                $query->where('class_id', $request->class_id);
            });
        }

        if ($request->has('teacher_id')) {
            $attendanceQuery->whereHas('studentClass.class', function ($query) use ($request) {
                $query->where('teacher_id', $request->teacher_id);
            });
        }

        if ($request->has('subject_id')) {
            $attendanceQuery->whereHas('studentClass.class', function ($query) use ($request) {
                $query->where('subject_id', $request->subject_id);
            });
        }

        // Get the filtered attendance records
        $attendances = $attendanceQuery->with(['studentClass.student', 'studentClass.class.teacher', 'studentClass.class.subject'])->get();

        // Return the view with the filtered data
        return view('attendances.index', compact('attendances', 'classes', 'teachers', 'subjects'));
    }
}
