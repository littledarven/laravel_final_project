<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Enrollment;
use App\Course;
use App\Http\Requests\EnrollmentRequest;

class EnrollmentController extends Controller
{
    public function index()
    {
        if(auth()->user()->is_admin==0)
        {
            $students = User::find((auth()->user()->id));
        }
        else
        {
            $students = User::where('is_admin',0)->paginate(15);
        }
    	
    	return view('enrollments/index',['students'=> $students]);
    }
    public function store(EnrollmentRequest $request)
    {
    	$enrollment = new Enrollment;
    	$enrollment->student_id = auth()->user()->id;
        $course_id = $request->input('id');
        $enrollment->course_id = $request->input('id');
    	 
    	 if($enrollment->save())
    	 {
            $course = Course::findOrFail($course_id); 
            $course->max_students-=1;
            $course->save();
    	 	\Session::flash('status', 'Matrícula em estado de aprovação !');
             return redirect('/enrollments');
    	 }
    	 else
    	 {
    	 	\Session::flash('status', 'Falha ao efetuar a matrícula !');
             return redirect('/courses');
    	 }
    	
     }
}
