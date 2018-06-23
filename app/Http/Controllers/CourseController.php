<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(15);
        return view('courses/index',['courses'=>$courses]);
    }
    public function create()
    {
        if((auth()->user()->is_admin==1))
        {
            return view('courses/new');    
        }
        \Session::flash('status', 'Você não tem permissão para acessar essa área !');
        return redirect('/courses');
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
        if((auth()->user()->is_admin==1))
        {
            $course = Course::findOrFail($id);
            return view('courses/edit',['course' => $course]);
        }
        \Session::flash('status', 'Você não tem permissão para acessar essa área !');
        return redirect('/courses');
    }
    public function update(StateRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->name = $request->input('name');
        $course->total_time = $request->input('total_time');
    }
    public function destroy($id)
    {
        if((auth()->user()->is_admin==1))
        {
            $course = Course::findOrFail($id);
            $course->delete();
            \Session::flash('status', 'Curso deletado com sucesso.');
            return redirect('/courses');
        }
        \Session::flash('status', 'Você não tem permissão para acessar essa área !');
        return redirect('/courses');
    }
}
