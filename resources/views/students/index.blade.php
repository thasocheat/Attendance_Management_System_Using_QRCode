<x-app-layout>
    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->student ? $student->student->name : 'No User' }}</td>
                    <td>{{ $student->class->class_name }}</td>
                    <td>{{ $student->class->teacher->name }}</td>
                    <td>{{ $student->class->subject->name }}</td>
                    <td>
                        <ul>
                            @foreach ($student->attendance as $attendance)
                                <li>{{ $attendance->date }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($student->attendance as $attendance)
                                <li>
                                    <span class="badge bg-{{ $attendance->status == 'absent' ? 'danger' : ($attendance->status == 'late' ? 'warning' : 'success') }}">{{ $attendance->status }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
