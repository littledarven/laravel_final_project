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
                            <th>Mais informações</th>
                            <th>Editar</th>
                        </tr>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->name }}</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$course->id}}">Visualizar</button></td>
                            <td>
                                <a href="/courses/{{ $course->id }}/edit" class="btn btn-outline-dark" id="edit">Editar</a>
                            </td>
                        </tr>
                      <div class="modal fade" id="myModal{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header"></button>
                                <h4 class="modal-title" id="myModalLabel">Informações da disciplina - {{$course->name}}</h4>
                            </div>
                            <div class="modal-body">
                                <p><b> Ementa da disciplina:</b> </p>
                                {{$course->description}}
                                <hr>
                                <p><b> Carga horária</b> - {{$course->total_time}}h </p>
                                <p><b> Vagas disponíveis</b> - {{$course->max_students}} restantes</p>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $courses->links()}}
            </table>    
        </main>
    </div>
</div>
@endsection
