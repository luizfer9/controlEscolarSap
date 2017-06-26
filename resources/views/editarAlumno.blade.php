@extends('master')
@section('contenido')
<form action="{{url('/actualizarAlumno')}}/{{$alumno->id}}" method="POST">
	<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" required value="{{$alumno->nombre}}">
	</div>
	<div class="form-group">
		<label for="control">Número de Control:</label>
		<input type="text" class="form-control" name="control" required value="{{$alumno->numero_control}}">
	</div>
	<div class="form-group">
		<label for="edad">Edad:</label>
		<input type="number" class="form-control" name="edad" required value="{{$alumno->edad}}">
	</div>
	<div class="form-group">
		<label for="sexo">Sexo:</label>
		<select name="sexo" class="form-control">
		@if($alumno->sexo==0)
			<option value="0" selected>Femenino</option>
			<option value="1">Masculino</option>
		@else
			<option value="0">Femenino</option>
			<option value="1" selected>Masculino</option>
		@endif
		</select>
	</div>
	<div class="form-group">
		<label for="carrera">Carrera:</label>
		<select name="carrera" class="form-control">
			<option value="{{$alumno->carrera_id}}">{{$alumno->nom_carrera}}</option>
			@foreach($carreras as $c)
				<option value="{{$c->id}}">{{$c->nombre}}</option>
			@endforeach
		</select>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>
@stop



