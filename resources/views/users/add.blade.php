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

                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter user name..." class="form-input mt-1 block w-full" required>
                            </div>
    
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter email..." class="form-input mt-1 block w-full" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter password..." class="form-input mt-1 block w-full" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter confirm password..." class="form-input mt-1 block w-full" required>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" class="form-select text-white-dark" required>
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>
                    
                            <div class="mb-4">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="first_name" id="first_name" placeholder="Enter first name..." class="form-input mt-1 block w-full" required>
                            </div>
    
                            
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="last_name" id="last_name" placeholder="Enter last name..." class="form-input mt-1 block w-full" required>
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-input form-control">
                            </div>

                            <div class="mb-4">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea name="address" id="address" placeholder="Enter address..." class="form-input mt-1 block w-full"></textarea>
                            </div>
    
                            
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" placeholder="Enter phonenumber..." class="form-input mt-1 block w-full" required>
                            </div>
    
                            <div class="form-group">
                                <label for="profile_picture">Profile Picture</label>
                                <input type="file" name="profile_picture" class="form-control" id="profile_picture_input" onchange="previewImage(event)">
                                <img id="profile_picture_preview" src="{{ asset('images/no-image.png') }}" alt="No Image" width="100" height="100" style="display: block; margin-top: 10px;">
                            </div>
                        </div>
            
                       
                
                        <button type="submit" class="btn btn-primary">Create</button>

                        
                    </form>

                </div>
            </div>
        </div>    
    </div>

    {{-- <div class="container">
        <h1>Create User</h1>
    
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control">
            </div>
    
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control">
            </div>
    
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control">
            </div>

            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" name="profile_picture" class="form-control" id="profile_picture_input" onchange="previewImage(event)">
                <img id="profile_picture_preview" src="{{ asset('images/no-image.png') }}" alt="No Image" width="100" height="100" style="display: block; margin-top: 10px;">
            </div>
    
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div> --}}
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