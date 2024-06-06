<x-app-layout>
    <div class="animate__animated p-6 flex justify-center items-center">
        <div class="panel max-w-3xl w-full bg-white rounded-lg shadow-lg">
            <div class="panel-header bg-primary text-white p-4 rounded-t-lg">
                <h2 class="text-xl font-semibold">Subject Details</h2>
            </div>
            <div class="panel-body p-6">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="col-span-1">
                        <p class="text-lg"><strong>Name:</strong></p>
                        <p class="text-gray-700">{{ $subject->name }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg"><strong>Code:</strong></p>
                        <p class="text-gray-700">{{ $subject->code }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-lg"><strong>Description:</strong></p>
                        <p class="text-gray-700">{{ $subject->description }}</p>
                    </div>
                </div>
            </div>
            <div class="panel-footer bg-gray-50 p-4 rounded-b-lg flex justify-end">
                <a href="{{ route('subjects.index') }}" class="btn btn-primary px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>
