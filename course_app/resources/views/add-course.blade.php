@extends('layout')

@section('content')
    <h2>Add New Course</h2>

    <form method="POST" action="{{ route('course.add') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Course Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="instructor" class="form-label">Instructor</label>
            <input type="text" id="instructor" name="instructor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="credit" class="form-label">Credit Hours</label>
            <input type="number" id="credit" name="credit" class="form-control" min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select id="semester" name="semester" class="form-select" required>
                <option value="">Select Semester</option>
                <option value="Fall">Fall</option>
                <option value="Spring">Spring</option>
                <option value="Summer">Summer</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Course</button>
    </form>
@endsection
