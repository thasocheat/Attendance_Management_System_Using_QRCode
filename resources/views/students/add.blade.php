<x-app-layout>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
    
        <!-- Select the class to enroll the student -->
        <label for="class_id">Class:</label>
        <select name="class_id" required>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
            @endforeach
        </select>
    
        <!-- Select the student to add -->
        <label for="student_id">Student:</label>
        <select name="student_id" required>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    
        <label for="enrollment_date">Enrollment Date:</label>
        <input type="date" name="enrollment_date" required>
    
        <!-- Default status set to absent -->
        <input type="hidden" name="status" value="absent">
    
        <button type="submit">Add Student</button>
    </form>
</x-app-layout>
