@extends('layout')

@section('content')
    <form method="GET" action="{{ route('courses') }}" class="mb-3">
        <input type="text" name="search" placeholder="Search by title" value="{{ $search }}" class="form-control">
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Instructor</th>
                <th>Credit Hours</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course['title'] }}</td>
                    <td>{{ $course['instructor'] }}</td>
                    <td>{{ $course['credit'] }}</td>
                    <td>{{ $course['semester'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('add.form') }}" class="btn btn-primary">Add New Course (Admin)</a>
@endsection
