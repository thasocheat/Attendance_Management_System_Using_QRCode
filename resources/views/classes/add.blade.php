<x-app-layout>
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div x-data="form">
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="{{ route('classes.index') }}" class="text-primary hover:underline">Subjects</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>{{ isset($class) ? 'Edit Class' : 'Create Class' }}</span>
                </li>
            </ul>
            <div class="panel">
                <div class="mb-5">
                    <form method="POST" action="{{ isset($class) ? route('classes.update', $class->id) : route('classes.store') }}">
                        @csrf
                        @if(isset($class))
                            @method('PUT')
                        @endif
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="subject_id">Subject</label>
                                <select name="subject_id" id="subject_id" class="form-select text-white-dark">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ isset($class) && $class->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="teacher_id">Teacher</label>
                                <select name="teacher_id" id="teacher_id" class="form-select text-white-dark">
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ isset($class) && $class->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="class_name" class="block text-sm font-medium text-gray-700">Class Name</label>
                                <input class="form-input mt-1 block w-full" type="text" name="class_name" placeholder="Enter class name..." id="class_name" value="{{ isset($class) ? $class->class_name : '' }}">
                            </div>
                            <div class="mb-4">
                                <label for="class_code" class="block text-sm font-medium text-gray-700">Class Code</label>
                                <input class="form-input mt-1 block w-full" type="text" name="class_code" placeholder="Enter class code..." id="class_code" value="{{ isset($class) ? $class->class_code : '' }}">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-6">{{ isset($class) ? 'Update' : 'Create' }}</button>
                        
                    </form>
                </div>
            </div>
        </div>    
    </div>
</x-app-layout>
