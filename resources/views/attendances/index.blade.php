<x-app-layout>

    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div x-data="form">
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="{{ route('students.index') }}" class="text-primary hover:underline">Students</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Add Students</span>
                </li>
            </ul>
            <div class="panel">
                <div class="mb-5">

                    <form method="GET" action="{{ route('attendance.index') }}">

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                            <!-- Select the class to enroll the student -->
                            <div class="form-group">
                                <label for="class_id">Class:</label>
                                <select name="class_id" class="form-select text-white-dark" required>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="teacher_id">Teacher:</label>
                                <select name="teacher_id" class="form-select text-white-dark" required>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subject_id">Subject:</label>
                                <select name="subject_id" class="form-select text-white-dark" required>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
            
                       
                
                        <button type="submit" class="btn btn-primary">Filter</button>

                        
                    </form>

                </div>
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
                                    <th>QR Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->studentClass->student->name }}</td>
                                        <td>{{ $attendance->studentClass->class->class_name }}</td>
                                        <td>{{ $attendance->studentClass->class->teacher->name }}</td>
                                        <td>{{ $attendance->studentClass->class->subject->name }}</td>
                                        <td>{{ $attendance->date }}</td>
                                        <td>
                                            @foreach ($attendance->studentClass->class->qrCodes as $qrCode)
                                                <img src="{{ asset('storage/' . $qrCode->qr_code) }}" alt="QR Code" width="50" height="50">
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $attendance->status == 'absent' ? 'danger' : ($attendance->status == 'late' ? 'warning' : 'success') }}">
                                                {{ $attendance->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="flex gap-4 items-center">
                                                <a href="#" class="btn btn-primary">Edit</a>
                                                <a href="#" class="btn btn-info">View</a>
                                                <form action="#" method="POST" class="delete-form d-inline">
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
                        <div class="dataTable-info">Showing {{ $attendances->firstItem() }} to {{ $attendances->lastItem() }} of {{ $attendances->total() }} entries</div>
                        <div class="dataTable-pagination">
                            {{ $attendances->links() }}
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








{{-- <x-app-layout>
    <form method="GET" action="{{ route('attendance.index') }}">
        <label for="class_id">Class:</label>
        <select name="class_id" required>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
            @endforeach
        </select>

        <label for="teacher_id">Teacher:</label>
        <select name="teacher_id" required>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>

        <label for="subject_id">Subject:</label>
        <select name="subject_id" required>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Date</th>
                <th>QR Code</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->studentClass->student->name }}</td>
                    <td>{{ $attendance->studentClass->class->class_name }}</td>
                    <td>{{ $attendance->studentClass->class->teacher->name }}</td>
                    <td>{{ $attendance->studentClass->class->subject->name }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>
                        @foreach ($attendance->studentClass->class->qrCodes as $qrCode)
                            <img src="{{ asset('storage/' . $qrCode->qr_code) }}" alt="QR Code" width="50" height="50">
                        @endforeach
                    </td>
                    <td>
                        <span class="badge bg-{{ $attendance->status == 'absent' ? 'danger' : ($attendance->status == 'late' ? 'warning' : 'success') }}">
                            {{ $attendance->status }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout> --}}
