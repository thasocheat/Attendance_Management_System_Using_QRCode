<x-app-layout>
    <div class="container">
        <h1>Classes</h1>
        <a href="{{ route('classes.create') }}" class="btn btn-primary">Add Class</a>
        <table class="table mt-3">
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
                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
