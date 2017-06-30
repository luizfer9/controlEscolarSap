@extends('master')

@section('contenido')
@include('flash::message')
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Aula</th>
			<th>Horario</th>
			<th>Maestro</th>
			<th>Materia</th>
	        <th ><a href="{{url('/gruposPDF')}}" class="btn btn-default btn-xs">PDF</a></th>
		</tr>
		@foreach($grupos as $a)
			<tr>
				<td>{{$a->id}}</td>
				<td>{{$a->aula}}</td>
				<td>{{$a->horario}}</td>
				<td>{{$a->maestro}}</td>
				<td>{{$a->materia}}</td>
				<td>
					<a href="{{url('/editarGrupo')}}/{{$a->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarGrupo')}}/{{$a->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $grupos->links() }}
</div>

@stop






