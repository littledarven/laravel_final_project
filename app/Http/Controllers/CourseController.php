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
    public function create()
    {
        return view('courses/new');
    }
    public function store(CourseRequest $request)
    {
        $course = new Course;
        $course->name = $request->input('name');
        $course->total_time = $request->input('total_time');
        if($course->save())
        {
            \Session::flash('status', 'Curso cadastrado com sucesso !');
            return redirect('/courses');
        } 
        else 
        {
            \Session::flash('status', 'Ocorreu um erro ao cadastrar o curso !');
            return view('courses/new');
        }
    }
    public function edit($id)
    {
        $course = $Course::findOrFail($id);
        return view('courses/edit',['course' => $course]);
    }
    public function update(StateRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->name = $request->input('name');
        $course->total_time = $request->input('total_time');
    }
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        \Session::flash('status', 'Curso deletado com sucesso.');
        return redirect('/courses');
    }
}
