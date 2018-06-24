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
                                <th>Email</th>
                            </tr>
                            @foreach($admins as $admin)
                            <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email}}</td>
                                    <td>
                                    <div id="buttons">
                                        {{-- ARRUMAR !!!!!!--}}
                                        {!! Form::open(['url' => "/enrollments/$admin->id",'method' => 'post']) !!}
                                        {!! Form::submit('+',['id' => 'enroll-button'])!!}
                                        {!! Form::close() !!}
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $admins->links()}}
                        </table>    
                </main>
            </div>
        </body>
        </html>
        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                