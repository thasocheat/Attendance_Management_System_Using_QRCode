<x-app-layout>
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div x-data="form">
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="{{ route('users.index') }}" class="text-primary hover:underline">Users</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Add Users</span>
                </li>
            </ul>
            <div class="panel">
                <div class="mb-5">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4 form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-input mt-1 block w-full form-control" value="{{ $user->name }}" required>
                            </div>
                    
                            <div class="mb-4 form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-input mt-1 block w-full form-control" value="{{ $user->email }}" required>
                            </div>
                    
                            <div class="mb-4 form-group">
                                <label for="password">Password (leave blank to keep current password)</label>
                                <input type="password" name="password" class="form-input mt-1 block w-full form-control">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4 form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-input mt-1 block w-full form-control">
                            </div>
                    
                            <div class="mb-4 form-group">
                                <label for="role">Role</label>
                                <select name="role" class="form-select text-white-dark form-control" required>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                                </select>
                            </div>
                    
                            <div class="mb-4 form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-input mt-1 block w-full form-control" value="{{ $user->first_name }}" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4 form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-input mt-1 block w-full form-control" value="{{ $user->last_name }}" required>
                            </div>
                    
                            <div class="mb-4 form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-input form-control" value="{{ $user->userDetails->date_of_birth }}">
                            </div>
                    
                            <div class="mb-4 form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-input mt-1 block w-full form-control" value="{{ $user->userDetails->address }}">
                            </div>
                        </div>
                
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4 form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" class="form-input mt-1 block w-full form-control" value="{{ $user->userDetails->phone_number }}">
                            </div>
                
                            <div class="mb-4 form-group">
                                <label for="profile_picture">Profile Picture</label>
                                <input type="file" name="profile_picture" class="form-control" id="profile_picture_input" onchange="previewImage(event)">
                                <img id="profile_picture_preview" src="{{ $user->userDetails->profile_picture_url ? $user->userDetails->profile_picture_url : asset('images/no-image.png') }}" alt="Profile Picture" width="100" height="100" style="display: block; margin-top: 10px;">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>    
    </div>

</x-app-layout>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('profile_picture_preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>