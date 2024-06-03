<x-app-layout>
    <form method="GET" action="{{ route('attendance.index') }}">
        <label for="class_id">Class:</label>
        <select name="class_id" required>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
            @endforeach
        </select>

        <label for="teacher_id">Teacher:</label>
        <select name="teacher_id" required>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>

        <label for="subject_id">Subject:</label>
        <select name="subject_id" required>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Date</th>
                <th>QR Code</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->studentClass->student->name }}</td>
                    <td>{{ $attendance->studentClass->class->class_name }}</td>
                    <td>{{ $attendance->studentClass->class->teacher->name }}</td>
                    <td>{{ $attendance->studentClass->class->subject->name }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>
                        @foreach ($attendance->studentClass->class->qrCodes as $qrCode)
                            <img src="{{ asset('storage/' . $qrCode->qr_code) }}" alt="QR Code" width="50" height="50">
                        @endforeach
                    </td>
                    <td>
                        <span class="badge bg-{{ $attendance->status == 'absent' ? 'danger' : ($attendance->status == 'late' ? 'warning' : 'success') }}">
                            {{ $attendance->status }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
