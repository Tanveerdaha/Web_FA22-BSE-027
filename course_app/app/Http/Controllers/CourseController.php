<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    function get_courses()
    {
        return  [
            ['id'=> 1, 'title' => 'HTML', 'instructor' => 'Dr. Ahsan', 'credit' => 3, 'semester' => 'Fall'],
            ['id'=> 2,'title' => 'CSS', 'instructor' => 'Ms. Sana', 'credit' => 3, 'semester' => 'Spring'],
            ['id'=> 3,'title' => 'JavaScript', 'instructor' => 'Mr. Ali', 'credit' => 4, 'semester' => 'Fall'],
            ['id'=> 4,'title' => 'Laravel', 'instructor' => 'Mr. Bilal', 'credit' => 4, 'semester' => 'Summer'],
            ['id'=> 5,'title' => 'Bootstrap', 'instructor' => 'Dr. Asim', 'credit' => 2, 'semester' => 'Spring']
        ];
    }

    public function __construct()
    {
        // Initialize courses in session if not already set
        if (!Session::has('courses')) {
            Session::put('courses', $this->get_courses());
        }
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $courses = Session::get('courses', $this->get_courses());

        if ($search) {
            $courses = array_filter($courses, function ($course) use ($search) {
                return stripos($course['title'], $search) !== false;
            });
        }

        return view('course-list', [
            'courses' => $courses,
            'search' => $search,
            'userType' => Session::get('user_type')
        ]);
    }

    public function showAddForm()
    {
        if (Session::get('user_type') !== 'admin') {
            return redirect()->route('courses');
        }

        return view('add-course');
    }

    public function add(Request $request)
    {
        $courses = Session::get('courses', []);
        $id = collect($courses)->max('id') + 1;
        $courses[] = [
            'id' => $id,
            'title' => $request->input('title'),
            'instructor' => $request->input('instructor'),
            'credit' => $request->input('credit'),
            'semester' => $request->input('semester')
        ];

        Session::put('courses', $courses);

        return redirect()->route('courses')->with('success', 'Course added successfully!');
    }

    public function delete($id)
    {
        $courses = Session::get('courses', []);
        
        // Find the course index by ID
        $index = array_search($id, array_column($courses, 'id'));
        
        if ($index !== false) {
            // Remove the course
            array_splice($courses, $index, 1);
            Session::put('courses', $courses);
            return redirect()->route('courses')->with('success', 'Course deleted successfully');
        }
        
        return redirect()->route('courses')->with('error', 'Course not found');
    }
}
