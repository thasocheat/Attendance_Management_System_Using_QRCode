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
                <span class="ltr:mr-3 rtl:ml-3">Students List: </span>
                <a href="{{ route('students.create') }}" class="btn btn-primary">Add Students</a>
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
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Teacher</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->student ? $student->student->name : 'No User' }}</td>
                                        <td>{{ $student->class->class_name }}</td>
                                        <td>{{ $student->class->teacher->name }}</td>
                                        <td>{{ $student->class->subject->name }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($student->attendance as $attendance)
                                                    <li>{{ $attendance->date }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach ($student->attendance as $attendance)
                                                    <li>
                                                        <span class="badge bg-{{ $attendance->status == 'absent' ? 'danger' : ($attendance->status == 'late' ? 'warning' : 'success') }}">{{ $attendance->status }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="flex gap-4 items-center">
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="#" class="btn btn-info">View</a>
                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="delete-form d-inline">
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
                        <div class="dataTable-info">Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries</div>
                        <div class="dataTable-pagination">
                            {{ $students->links() }}
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


