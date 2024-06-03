<?php

namespace App\Http\Controllers\Class;

use App\Models\User;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\ClassModel;
use App\Models\QrCodeModel;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassModel::with('qrCodes')->get();
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        $teachers = User::all();
        return view('classes.add', compact('subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
            'class_name' => 'required|string|max:255',
            'class_code' => 'required|string|max:255|unique:classes,class_code',
        ]);

        $class = ClassModel::create($request->all());

        $this->generateQrCode($class);

        return redirect()->route('classes.index');
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
    public function edit(ClassModel $class)
    {
        $subjects = Subject::all();
        $teachers = User::all();
        return view('classes.add', compact('class', 'subjects', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassModel $class)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
            'class_name' => 'required|string|max:255',
            'class_code' => 'required|string|max:255|unique:classes,class_code,' . $class->id,
        ]);

        $class->update($request->all());

        $this->generateQrCode($class);

        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassModel $class)
    {
         // Delete the related records in the student_classes table first
        StudentClass::where('class_id', $class->id)->delete();

        // Delete the related QR code records first
        QrCodeModel::where('class_id', $class->id)->delete();

        $class->delete();

        return redirect()->route('classes.index');
    }

    private function generateQrCode(ClassModel $class)
    {
        $qrCodeData = json_encode([
            'class_id' => $class->id,
            'class_name' => $class->class_name,
            'teacher_id' => $class->teacher_id,
            'subject_id' => $class->subject_id,
        ]);
    
        $qrCodeContent = route('classes.scan', ['data' => urlencode($qrCodeData)]);
        $qrCodeImage = QrCode::size(300)->generate($qrCodeContent);

        $qrCodePath = 'qr_codes/' . $class->class_code . '.svg';
        Storage::disk('public')->put($qrCodePath, $qrCodeImage);


        QrCodeModel::create([
            'class_id' => $class->id,
            'qr_code' => $qrCodePath,
            'expiry_time' => now()->addDays(1), // Set expiry time as needed
        ]);
    }
    

    public function scanQrCode(Request $request, $data)
    {
        $qrCodeData = json_decode(urldecode($data), true);

        // Retrieve class, teacher, and subject information
        $class = ClassModel::with(['teacher', 'subject', 'students'])->findOrFail($qrCodeData['class_id']);

        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('login')->with('info', 'Please log in to mark your attendance.');
        }

        $user = auth()->user();

        // Check if the user is a student in the class
        $studentClass = $class->studentsClasses->where('student_id', $user->id)->first();

        if ($studentClass) {
            // Update attendance record for the student
            $attendance = Attendance::firstOrCreate([
                'student_class_id' => $studentClass->id,
                'date' => now()->toDateString(),
            ], [
                'status' => 'absent',
            ]);

            $attendance->status = 'present';
            $attendance->scanned_qr_code = $data; // Save the scanned QR code data
            $attendance->save();

            // return redirect()->route('attendance')->with('success', 'Your attendance has been marked as present.');
        }

        // If user is not a student in the class, show class information
        return view('classes.info', compact('class'));
    }




}
