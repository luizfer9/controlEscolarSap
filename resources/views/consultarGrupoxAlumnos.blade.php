@extends('master')

@section('contenido')

<table class="table table-striped">
	<thead>
		<tr>
			<th>Alumno</th>
			<th>Grupo</th>
			<th>Maestro</th>
      		<th ><a href="{{url('/gruposXalumnosPDF')}}" class="btn btn-default btn-xs">PDF</a></th>
		</tr>
		@foreach($grpxal as $a)
			<tr>
				<td>{{$a->alumno}}</td>
				<td>{{$a->id_grupo}}</td>
				<td>{{$a->maestro}}</td><!--borrar maestro_id y dejar maestro-->
				<td>

				<a href="{{url('/editarGroupxAlumnos')}}/{{$a->id_alumno}}&&{{$a->id_grupo}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				
				<a href="{{url('/eliminarGroupxAlumnos')}}/{{$a->id_alumno}}&&{{$a->id_grupo}}" class="btn btn-danger btn-xs">
					<!--href="{{url('/eliminarGroupxAlumnos')}}/{{$a->id_alumno && $a->id_grupo}}"-->
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
				</a>
				</td>
			</tr>
		@endforeach
	</thead>
</table>
<div class="text-center">
	{{ $grpxal->links() }}
</div>

@stop
