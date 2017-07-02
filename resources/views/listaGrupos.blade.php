@extends('master')

@section('contenido')
@include('flash::message')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Clave materia</th>
			<th>Nombre</th>
			<th>Clave grupo</th>
			<th>Aula</th>
			<th>Horario</th>
			<th>Maestro</th>
			<th>Opciones</th>
      		<th >
      		</th>
		</tr>
		@foreach($grpxal as $a)
			<tr>
				<td>{{$a->materia_id}}</td>
				<td>{{$a->materia}}</td>
				<td>{{$a->id_grupo}}</td>
				<td>{{$a->aula}}</td>
				<td>{{$a->horario}}</td>
				<td>{{$a->maestro}}</td>
				<td>
				<a href="{{url('/capturarCalificaciones')}}/{{$a->id_grupo}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				</a>
      			<a href="{{url('/gruposXalumnosPDF')}}/{{$a->id_grupo}}" class="btn btn-default btn-xs">PDF</a>
				</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $grpxal->links() }}
</div>

@stop
