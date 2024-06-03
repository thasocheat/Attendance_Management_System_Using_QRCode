    <h1>Class Information</h1>
    <p><strong>Class Name:</strong> {{ $class->class_name }}</p>
    <p><strong>Teacher:</strong> {{ $class->teacher->name }}</p>
    <p><strong>Subject:</strong> {{ $class->subject->name }}</p>

    <h2>Students:</h2>
    <ul>
        @foreach($class->students as $student)
            <li>{{ $student->name }}</li>
        @endforeach
    </ul>
