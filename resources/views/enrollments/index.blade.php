@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center">Disciplinas quais estou matrículado</div>
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
                            <th>Data de Matrícula</th>
                            <th>Matrícula efetivada</th>
                        </tr>
                        @foreach($user->courses as $enrollment)
                        <tr>
                            <td>{{ $enrollment->id }}</td>
                            <td>{{ $enrollment->name }}</td>
                            <td>{{ $enrollment->total_time}}</td>
                            <td>{{ $enrollment->created_at}}</td>
                            <td>{{ $enrollment->is_aproved}}</td>
                        </tr>
                        @endforeach
                       
                    </table>    
                </main>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
