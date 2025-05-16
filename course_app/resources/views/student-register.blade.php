@extends('layout')

@section('content')
<h2 class="mb-4">Student Registration</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register.post') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" id="name" name="name" class="form-control" required autocomplete="name" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" required autocomplete="email" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
    </div>

    <button type="submit" class="btn btn-success">Register</button>
</form>

<p class="mt-3">
    Already registered? <a href="{{ route('login') }}">Login here</a>
</p>
@endsection
