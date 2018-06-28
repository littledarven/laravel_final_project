@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Curso                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-light" style="text-align: center">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => "/courses/$course->id", 'method' => 'put', 'class'=>'form-group col-10']) !!}
                        
                        {{ Form::label('name', 'Nome',['class'=>'col-sm-6 col-form-label']) }}
                        {{ Form::text('name', $course->name, ['class' => 'form-control col-3','required']) }}
                        
                        @if ($errors->has('name'))
                            <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                        @endif

                        {{ Form::label('total_time', 'Carga Horária',['class'=>'col-sm-6 col-form-label']) }}
                        {{ Form::text('total_time', $course->total_time, ['class' => 'form-control col-3','required']) }}
                        
                        @if ($errors->has('total_time'))
                            <div class="error" style="color: red">{{ $errors->first('citizens') }}</div>
                        @endif
                        <br>
                        {!!Form::submit('Salvar',['class'=>'btn btn-outline-primary col-2'])!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
