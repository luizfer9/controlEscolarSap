@extends('master')

@section('contenido')
@include('flash::message')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Alumno_ID</th>
			<th>Alumno</th>
			<th>Clave materia</th>
			<th>Nombre</th>
			<th>Clave grupo</th>
			<th>Aula</th>
			<th>Horario</th>
			<th>Maestro</th>
			<th>Calificación</th>
			<th>Opciones</th>
      		<th >
      		</th>
		</tr>
		@foreach($grpxal as $a)
			<tr>
				<td>{{$a->id_alumno}}</td>
				<td>{{$a->alumno}}</td>
				<td>{{$a->materia_id}}</td>
				<td>{{$a->materia}}</td>
				<td>{{$a->id_grupo}}</td>
				<td>{{$a->aula}}</td>
				<td>{{$a->horario}}</td>
				<td>{{$a->maestro}}</td>
				<td>{{$a->calificacion}}</td>
				<td>

				<a href="{{url('/editarGroupxAlumnos')}}/{{$a->id_alumno}}&&{{$a->id_grupo}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				<a href="{{url('/bajaGrupo')}}/{{$a->id_alumno}}&&{{$a->id_grupo}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
				</a>		
				</a>
      			<!--a href="{{url('/gruposXalumnosPDF')}}" class="btn btn-default btn-xs">PDF</a-->
				</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $grpxal->links() }}
</div>

@stop
