<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EnrollmentController extends Controller
{
    public function index()
    {
    	$enrollments = EnrollmentController::with('users');
    	return view('enrollements/index',['enrollements'=> $enrollements]);
    }
    public function store(Request $request, $id)
    {
    	$enrollement = new Enrollment;
    	$enrollment->student_id = auth()->user()->id;
    	$enrollment->course_id = Course::findOrFail($id);
    	if($enrollment->save();)
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
