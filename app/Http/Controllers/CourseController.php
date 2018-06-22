<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::All();
        return view('courses/index',['courses'=>$courses]);
    }
    public function create(CourseRequest $request)
    {
        $course = new Course;
        $course->name = $request->input('name');
        $course->total_time = $request->input('total_time');
    }
}
