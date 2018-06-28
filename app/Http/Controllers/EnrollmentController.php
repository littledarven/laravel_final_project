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

    	$user = User::find((auth()->user()->id));
    	return view('enrollments/index',['user'=> $user]);
    }
    public function store(EnrollmentRequest $request)
    {
    	$enrollment = new Enrollment;
    	$enrollment->student_id = auth()->user()->id;
        $enrollment->course_id = $request->input('id');
    	 
    	 if($enrollment->save())
    	 {
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
