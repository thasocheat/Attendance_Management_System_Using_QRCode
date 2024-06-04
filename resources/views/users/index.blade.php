<x-app-layout>
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div>
            <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <!-- Your SVG code -->
                    </svg>
                </div>
                <span class="ltr:mr-3 rtl:ml-3">User List: </span>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add Users</a>
            </div>
            <div class="panel mt-6">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                    <div class="dataTable-top">
                        <div class="dataTable-search">
                            <input class="dataTable-input" placeholder="Search..." type="text">
                        </div>
                    </div>
                    <div class="dataTable-container">
                        <table id="myTable" class="table-hover whitespace-nowrap dataTable-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Profile Picture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>
                                            @if($user->userDetails?->profile_picture_url === null)
                                                <img id="profile_picture_preview" src="{{ asset('images/no-image.png') }}" alt="No Image" width="100" height="100" style="display: block; margin-top: 10px;">
                                            @else
                                                <img src="{{$user->userDetails->profile_picture_url}}" alt="Profile Picture" width="50">
                                            @endif

                                        </td>
                                        <td>
                                            <div class="flex gap-4 items-center">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-info">View</a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="delete-form d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-button">Delete</button>
                                                </form>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="dataTable-bottom">
                        <div class="dataTable-info">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</div>
                        <div class="dataTable-pagination">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent the form from submitting immediately
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if user confirms
                        }
                    });
                });
            });

            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
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