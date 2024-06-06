<x-app-layout>
    <div class="animate__animated p-6 flex justify-center items-center min-h-screen bg-gray-100">
        <div class="panel max-w-3xl w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="panel-header bg-primary text-white p-4">
                <h2 class="text-xl font-semibold">Class Details</h2>
            </div>
            <div class="panel-body p-6">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Class Name:</p>
                        <p class="text-gray-600">{{ $class->class_name }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Class Code:</p>
                        <p class="text-gray-600">{{ $class->class_code }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Subject:</p>
                        <p class="text-gray-600">{{ $class->subject->name }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Teacher:</p>
                        <p class="text-gray-600">{{ $class->teacher->name }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-lg font-semibold text-gray-800">Students:</p>
                        <ul class="list-disc list-inside">
                            @foreach($class->studentsClasses as $studentClass)
                                <li class="text-gray-600">{{ $studentClass->user->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-span-2">
                        <p class="text-lg font-semibold text-gray-800">QR Codes:</p>
                        <ul class="list-disc list-inside">
                            @foreach($class->qrCodes as $qrCode)
                                <li class="text-gray-600">
                                    <img src="{{ Storage::url($qrCode->qr_code) }}" alt="QR Code">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-footer bg-gray-50 p-4 flex justify-end space-x-4">
                <a href="{{ route('classes.index') }}" class="btn btn-primary px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition duration-150">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>
