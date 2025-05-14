<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    private function getDefaultCourses()
    {
        return [
            ['title' => 'HTML', 'instructor' => 'Dr. Ahsan', 'credit' => 3, 'semester' => 'Fall'],
            ['title' => 'CSS', 'instructor' => 'Ms. Sana', 'credit' => 3, 'semester' => 'Spring'],
            ['title' => 'JavaScript', 'instructor' => 'Mr. Ali', 'credit' => 4, 'semester' => 'Fall'],
            ['title' => 'Laravel', 'instructor' => 'Mr. Bilal', 'credit' => 4, 'semester' => 'Summer'],
            ['title' => 'Bootstrap', 'instructor' => 'Dr. Asim', 'credit' => 2, 'semester' => 'Spring']
        ];
    }

    public function index(Request $request)
    {
        // Load courses from session or use default
        $courses = session('courses', $this->getDefaultCourses());

        $search = $request->input('search');
        $filtered = $courses;

        if ($search) {
            $filtered = array_filter($courses, function($course) use ($search) {
                return stripos($course['title'], $search) !== false;
            });
        }

        return view('courses', ['courses' => $filtered, 'search' => $search]);
    }

    public function showAddForm()
    {
        return view('add-course');
    }

    public function add(Request $request)
    {
        $courses = session('courses', $this->getDefaultCourses());

        $newCourse = [
            'title' => $request->input('title'),
            'instructor' => $request->input('instructor'),
            'credit' => $request->input('credit'),
            'semester' => $request->input('semester')
        ];

        $courses[] = $newCourse;

        session(['courses' => $courses]); // Save back to session

        return redirect()->route('courses')->with('success', 'Course added successfully.');
    }
}
