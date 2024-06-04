<x-app-layout>
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div x-data="form">
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="{{ route('subjects.index') }}" class="text-primary hover:underline">Subjects</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Add Subject</span>
                </li>
            </ul>
            <div class="panel">
                <div class="mb-5">
                    <form method="POST" action="{{ route('subjects.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Subject Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter subject name..." class="form-input mt-1 block w-full" required>
                            </div>
                            <div class="mb-4">
                                <label for="code" class="block text-sm font-medium text-gray-700">Subject Code</label>
                                <input type="text" name="code" id="code" placeholder="Enter subject code..." class="form-input mt-1 block w-full" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" placeholder="Enter subject description..." class="form-input mt-1 block w-full"></textarea>
                            </div>
                        </div>
                       
                        
                        <button type="submit" class="btn btn-primary mt-6">Submit</button>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</x-app-layout>
