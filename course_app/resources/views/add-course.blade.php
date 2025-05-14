@extends('layout')

@section('content')
<!-- Login Popup -->
<div id="loginPopup" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.7); display: flex; justify-content: center;
    align-items: center; z-index: 9999;">
    <div style="background: white; padding: 20px; border-radius: 10px; width: 300px;">
        <h4>Admin Login</h4>
        <input type="text" id="username" placeholder="Username" class="form-control mb-2">
        <input type="password" id="password" placeholder="Password" class="form-control mb-2">
        <button onclick="checkLogin()" class="btn btn-primary w-100">Login</button>
    </div>
</div>

<!-- Actual Page Content -->
<div id="mainContent" style="display: none;">
    <form method="POST" action="{{ route('add.course') }}">
        @csrf
        <div class="mb-3">
            <label>Course Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Instructor</label>
            <input type="text" name="instructor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Credit Hours</label>
            <input type="number" name="credit" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Semester</label>
            <select name="semester" class="form-control" required>
                <option>Fall</option>
                <option>Spring</option>
                <option>Summer</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Course</button>
    </form>
</div>

<!-- JavaScript -->
<script>
    function checkLogin() {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        if (username === "admin" && password === "admin") {
            document.getElementById("loginPopup").style.display = "none";
            document.getElementById("mainContent").style.display = "block";
        } else {
            alert("Invalid credentials. Please try again.");
        }
    }
</script>
@endsection
