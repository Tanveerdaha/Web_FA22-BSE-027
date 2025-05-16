@extends('layout')

@section('content')
    <h2>Course List</h2>

    <form method="GET" action="{{ route('courses') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search courses by title...">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    @if(count($courses) > 0)
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Title</th>
                    <th>Instructor</th>
                    <th>Credit Hours</th>
                    <th>Semester</th>
                    @if(session('user_type') === 'admin')
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $key => $course)
                    <tr>
                        <td>{{ $course['title'] }}</td>
                        <td>{{ $course['instructor'] }}</td>
                        <td>{{ $course['credit'] }}</td>
                        <td>{{ $course['semester'] }}</td>
                        @if(session('user_type') === 'admin')
                            <td>
                                <form method="POST" action="{{ route('course.delete', ['id' => $course['id']]) }}" 
                                      onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No courses found.</p>
    @endif
@endsection
