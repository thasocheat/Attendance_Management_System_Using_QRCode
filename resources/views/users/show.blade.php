<x-app-layout>
    <div class="animate__animated p-6 flex justify-center items-center min-h-screen bg-gray-100">
        <div class="panel max-w-3xl w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="panel-header bg-primary text-white p-4">
                <h2 class="text-xl font-semibold">User Details</h2>
            </div>
            <div class="panel-body p-6">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Name:</p>
                        <p class="text-gray-600">{{ $user->name }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Email:</p>
                        <p class="text-gray-600">{{ $user->email }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Role:</p>
                        <p class="text-gray-600">{{ $user->role }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">First Name:</p>
                        <p class="text-gray-600">{{ $user->first_name }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Last Name:</p>
                        <p class="text-gray-600">{{ $user->last_name }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Date of Birth:</p>
                        <p class="text-gray-600">{{ $user->userDetails->date_of_birth }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Address:</p>
                        <p class="text-gray-600">{{ $user->userDetails->address }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-lg font-semibold text-gray-800">Phone Number:</p>
                        <p class="text-gray-600">{{ $user->userDetails->phone_number }}</p>
                    </div>
                    <div class="col-span-2">
                        @if($user->userDetails->profile_picture_url)
                            <p class="text-lg font-semibold text-gray-800">Profile Picture:</p>
                            <img src="{{ $user->userDetails->profile_picture_url }}" alt="Profile Picture" class="w-32 h-32 rounded-full">
                        @endif
                    </div>
                </div>
            </div>
            <div class="panel-footer bg-gray-50 p-4 flex justify-end space-x-4">
                <a href="{{ route('users.index') }}" class="btn btn-primary px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition duration-150">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>
