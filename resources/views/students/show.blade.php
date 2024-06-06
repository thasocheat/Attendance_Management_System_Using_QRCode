<x-app-layout>
    <div class="animate__animated p-6 flex justify-center items-center min-h-screen bg-gray-100">
        <div class="panel max-w-3xl w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="panel-header bg-primary text-white p-4">
                <h2 class="text-xl font-semibold">Student Details</h2>
            </div>
            <div class="panel-body p-6">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Name:</p>
                        <p class="text-gray-600">{{ $student->user->name }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Email:</p>
                        <p class="text-gray-600">{{ $student->user->email }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Class:</p>
                        <p class="text-gray-600">{{ $student->class->class_name }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Enrollment Date:</p>
                        <p class="text-gray-600">{{ $student->enrollment_date }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-lg font-semibold text-gray-800">Attendance:</p>
                        <ul class="list-disc list-inside">
                            @foreach($student->attendance as $attendance)
                                <li class="text-gray-600">{{ $attendance->date }} - {{ $attendance->status }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-footer bg-gray-50 p-4 flex justify-end space-x-4">
                <a href="{{ route('students.index') }}" class="btn btn-primary px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition duration-150">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>
