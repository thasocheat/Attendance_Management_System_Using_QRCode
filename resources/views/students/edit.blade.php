<x-app-layout>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Select the class to enroll the student -->
        <label for="class_id">Class:</label>
        <select name="class_id" required>
            @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
            @endforeach
        </select>

        <!-- Select the student to add -->
        <label for="student_id">Student:</label>
        <select name="student_id" required>
            @foreach($students as $s)
                <option value="{{ $s->id }}" {{ $student->student->name == $s->name ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select>
        

        <label for="enrollment_date">Enrollment Date:</label>
        <input type="date" name="enrollment_date" value="{{ $student->enrollment_date }}" required>

        <!-- Default status set to absent -->
        <input type="hidden" name="status" value="{{ $student->status }}">

        <button type="submit">Update Student</button>
    </form>
</x-app-layout>
