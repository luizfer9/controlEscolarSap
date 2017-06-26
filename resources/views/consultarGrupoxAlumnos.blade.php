@extends('master')

@section('contenido')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Alumno</th>
			<th>Grupo</th>
			<th>Maestro</th>
			<th>Opciones</th>
		</tr>
		@foreach($grpxal as $a)
			<tr>
				<td>{{$a->alumno}}</td>
				<td>{{$a->aula}}</td>
				<td>{{$a->maestro}}</td>
				<td>
				<a href="{{url('/')}}" class="btn btn-primary btn-xs">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				<a href="{{url('/')}}" class="btn btn-danger btn-xs">
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
