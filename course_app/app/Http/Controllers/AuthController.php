<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private $adminUsername = 'admin';
    private $adminPassword = 'admin';

    public function showLogin()
    {
        return view('auth-login');
    }

    public function showRegister()
    {
        return view('student-register');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === $this->adminUsername && $password === $this->adminPassword) {
            Session::put('user_type', 'admin');
            return redirect()->route('courses');
        }

        $students = Session::get('students', []);
        foreach ($students as $student) {
            if ($student['email'] === $username && $student['password'] === $password) {
                Session::put('user_type', 'student');
                Session::put('student_email', $username);
                return redirect()->route('courses');
            }
        }

        return redirect()->route('login')->withErrors(['Invalid credentials']);
    }

    public function register(Request $request)
    {
        $students = Session::get('students', []);

        $students[] = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        Session::put('students', $students);
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        $courses = Session::get('courses', []);
        Session::flush();
        Session::put('courses', $courses); // Reinitialize courses in session
        return redirect()->route('login');
    }
}
