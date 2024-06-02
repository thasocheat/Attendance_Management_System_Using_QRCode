<x-app-layout>
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div x-data="form">
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="{{ route('subjects.index') }}" class="text-primary hover:underline">Subjects</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Edit Subject</span>
                </li>
            </ul>
            <div class="panel">
                <div class="mb-5">
                    <form method="POST" action="{{ route('subjects.update', $subject->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Subject Name</label>
                            <input type="text" name="name" id="name" value="{{ $subject->name }}" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Subject Code</label>
                            <input type="text" name="code" id="code" value="{{ $subject->code }}" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="form-input mt-1 block w-full">{{ $subject->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-6">Update</button>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</x-app-layout>
