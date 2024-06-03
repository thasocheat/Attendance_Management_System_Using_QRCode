<?php

namespace App\Http\Controllers\Students;

use App\Models\Attendance;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\User;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all students with their attendance records
        $students = StudentClass::with('attendance', 'user')->get();

        // Return the view with the students data
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = ClassModel::all();
        $students = User::all();
        return view('students.add', compact('classes', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'student_id' => 'required|exists:users,id', // Ensure the selected student exists
            'enrollment_date' => 'required|date',
        ]);

        // Create the student and associate with the selected class and student
        $student = StudentClass::create([
            'class_id' => $request->class_id,
            'student_id' => $request->student_id,
            'enrollment_date' => $request->enrollment_date,
        ]);

        // Create the associated attendance record with default status absent
        Attendance::create([
            'student_class_id' => $student->id,
            'date' => $request->enrollment_date,
            'status' => $request->status, // This will be 'absent' as set in the form
            // Add more fields as needed
        ]);

        // Redirect to a page after successful submission
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentClass $student)
    {
        // Fetch the classes and students for the dropdowns
        $classes = ClassModel::all();
        $students = User::all();
        
        // Return the edit view with the student data and dropdown options
        return view('students.edit', compact('student', 'classes', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentClass $student)
    {
        // Validate form input
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'student_id' => 'required|exists:users,id', // Ensure the selected student exists
            'enrollment_date' => 'required|date',
        ]);

        // Update the student record
        $student->update([
            'class_id' => $request->class_id,
            'student_id' => $request->student_id,
            'enrollment_date' => $request->enrollment_date,
        ]);

        // Redirect back to index page after successful update
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentClass $student)
    {
        // Delete the student record
        $student->delete();

        // Redirect back to index page after successful deletion
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
