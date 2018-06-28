<script>    
    function ConfirmEnrollment()
    {
        return confirm('Tem certeza desta ação?');
    }
</script>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center">Disciplinas Disponíveis</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Carga Horária</th>
                            @if(auth()->user()->is_admin==0)
                            <th>Inscrever-me</th>
                            @else
                            <th>Editar</th>
                            @endif
                        </tr>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->total_time}}</td>
                            @if(auth()->user()->is_admin==0)
                            <td>
                                <div id="buttons">
                                    {{-- ARRUMAR !!!!!!--}}
                                    {!! Form::open(['url' => "/enrollments/$course->id",'method' => 'post', 'onsubmit' => 'return ConfirmEnrollment()']) !!}
                                    {!! Form::submit('+',['id' => 'enroll-button'])!!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            @else
                            <td>
                            <a href="/courses/{{ $course->id }}/edit" class="btn btn-outline-dark" id="edit">Editar</a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                        {{ $courses->links()}}
                    </table>    
                </main>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
