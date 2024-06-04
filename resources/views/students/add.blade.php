<x-app-layout>

    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div x-data="form">
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="{{ route('students.index') }}" class="text-primary hover:underline">Students</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Add Students</span>
                </li>
            </ul>
            <div class="panel">
                <div class="mb-5">

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                            <!-- Select the class to enroll the student -->
                            <div class="form-group">
                                <label for="class_id">Class:</label>
                                <select name="class_id" class="form-select text-white-dark" required>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <!-- Select the student to add -->
                                <label for="student_id">Student:</label>
                                <select name="student_id" class="form-select text-white-dark" required>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="enrollment_date">Enrollment Date:</label>
                                <input type="date" name="enrollment_date" class="form-input form-control" required>
                            </div>

                            <!-- Default status set to absent -->
                            <input type="hidden" name="status" value="absent">
                        </div>
            
                       
                
                        <button type="submit" class="btn btn-primary">Add Student</button>

                        
                    </form>

                </div>
            </div>
        </div>    
    </div>
</x-app-layout>
