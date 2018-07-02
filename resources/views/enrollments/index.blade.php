
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				@if(auth()->user()->is_admin==0)
				<div class="card-header" style="text-align:center">Disciplinas quais estou matrículado</div>
				@else
				<div class="card-header" style="text-align:center">Alunos e matrículas</div>
				@endif
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
							<th>Ver informações</th>
							@if(auth()->user()->is_admin==0)
							<th>Matrícula efetivada</th>
							@endif
						</tr>
						@if(auth()->user()->is_admin==0)

						@foreach($students->courses as $enrollment)
						<tr>
							<td>{{ $enrollment->id }}</td>
							<td>{{ $enrollment->name }}</td>
							@if($enrollment->pivot->is_authorised==0)
							<td>Não</td>
							@else
							<td>Sim</td>
							@endif
						</tr>
						@endforeach
						@else
						@foreach($students as $student)
						<tr>
							<td> {{$student->id}}</td>
							<td> {{$student->name}}</td>
							<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$student->id}}">Visualizar</button></td>
						</tr>

						<div class="modal fade" id="myModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header"></button>
										<h4 class="modal-title" id="myModalLabel">Informações do Aluno - {{$student->name}}</h4>

									</div>
									<div class="modal-body">
										<div id="body-content">
											@foreach($student->courses as $enrollment)
											<p><b>ID - </b>{{ $enrollment->id }}</p>
											<p><b>Disciplina - </b>{{ $enrollment->name }}</p>
											<p><b>Matrícula Efetivada - </b>
												@if($enrollment->pivot->is_authorised==0)
												Não
												@else
												Sim
												@endif
											</p>
											<hr>
											@endforeach
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@endif
						 
					</table>	
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection

