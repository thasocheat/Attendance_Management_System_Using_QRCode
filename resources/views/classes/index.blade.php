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
                <span class="ltr:mr-3 rtl:ml-3">Classes List: </span>
                <a href="{{ route('classes.create') }}" class="btn btn-primary">Add Classes</a>
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
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>QR Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classes as $class)
                                    <tr>
                                        <td>{{ $class->class_name }}</td>
                                        <td>{{ $class->subject->name }}</td>
                                        <td>{{ $class->teacher->name }}</td>
                                        <td>
                                            @if($class->qrCodes->isNotEmpty())
                                                <img src="{{ asset('storage/' . $class->qrCodes->first()->qr_code) }}" alt="QR Code" width="100">
                                            @else
                                                No QR Code
                                            @endif
                                        </td>
                                        <td>
                                            <div class="flex gap-4 items-center">
                                                <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-info">View</a>
                                                <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="delete-form d-inline">
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
                        <div class="dataTable-info">Showing {{ $classes->firstItem() }} to {{ $classes->lastItem() }} of {{ $classes->total() }} entries</div>
                        <div class="dataTable-pagination">
                            {{ $classes->links() }}
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

