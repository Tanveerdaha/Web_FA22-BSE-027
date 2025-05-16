@extends('layout')

@section('content')
<h2 class="mb-4">Login</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('login.post') }}">
    @csrf

    <div class="mb-3">
        <label for="type" class="form-label">Login as</label>
        <select id="type" name="type" class="form-control" required onchange="toggleLoginFields()">
            <option value="student" selected>Student</option>
            <option value="admin">Admin</option>
        </select>
    </div>

    <div id="fields_div">
        
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

<p class="mt-3">
    New student? <a href="{{ route('register') }}">Register here</a>
</p>

<script>
function toggleLoginFields() {
    const type = document.getElementById('type').value;
    const fieldsDiv = document.getElementById('fields_div');

    if (type==='student')
    {
        fieldsDiv.innerHTML = `<div class="mb-3">
            <label for="username" class="form-label">Student Username</label>
            <input type="text" id="username" name="username" class="form-control" required autocomplete="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
        </div>`
    }
    else
    {
        fieldsDiv.innerHTML = `<div class="mb-3">
            <label for="username" class="form-label">Admin Username</label>
            <input type="text" id="username" name="username" class="form-control" required autocomplete="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Admin Password</label>
            <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
        </div>`
    }
}
document.addEventListener('DOMContentLoaded', toggleLoginFields);
</script>
@endsection
