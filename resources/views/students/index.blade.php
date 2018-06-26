<script>
    function ConfirmTurnAdmin()
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
                <div class="card-header" style="text-align:center">Alunos Cadastrados</div>
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
                            <th>Email</th>
                            @if(auth()->user()->is_admin==1)
                            <th>Tornar Administrador</th>
                            @endif
                        </tr>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email}}</td>
                            <td>
                                @if(auth()->user()->is_admin==1)
                                <div id="buttons">
                                    {!! Form::open(['url' => "/students/$student->id",'method' => 'patch', 'onsubmit' => 'return ConfirmTurnAdmin()']) !!}
                                    {!! Form::submit('+',['id' => 'turn_admin-button'])!!}
                                    {!! Form::close() !!}
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        {{ $students->links()}}
                    </table>    
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
