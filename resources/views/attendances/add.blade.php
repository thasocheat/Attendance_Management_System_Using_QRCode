<x-app-layout>
    <h1>{{ isset($class) ? 'Edit Class' : 'Create Class' }}</h1>
    <form method="POST" action="{{ isset($class) ? route('classes.update', $class->id) : route('classes.store') }}">
        @csrf
        @if(isset($class))
            @method('PUT')
        @endif
        <div>
            <label for="subject_id">Subject</label>
            <select name="subject_id" id="subject_id">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ isset($class) && $class->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="teacher_id">Teacher</label>
            <select name="teacher_id" id="teacher_id">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ isset($class) && $class->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="class_name">Class Name</label>
            <input type="text" name="class_name" id="class_name" value="{{ isset($class) ? $class->class_name : '' }}">
        </div>
        <div>
            <label for="class_code">Class Code</label>
            <input type="text" name="class_code" id="class_code" value="{{ isset($class) ? $class->class_code : '' }}">
        </div>
        <button type="submit">{{ isset($class) ? 'Update' : 'Create' }}</button>
    </form>
</x-app-layout>