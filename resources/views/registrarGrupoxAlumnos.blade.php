@extends('master')

@section('contenido')
<form action="{{url('/guardarGruposxAlumnos')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="alumno">Alumno:</label>
		<select name="alumno" class="form-control">
			@foreach($alumnos as $c)
				<option value="{{$c->id}}">{{$c->nombre}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="grupo">Grupo:</label>
		<select name="grupo" class="form-control">
			@foreach($grupos as $c)
				<option value="{{$c->id}}">{{$c->aula}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="maestro">Maestro:</label>
		<select name="maestro" class="form-control">
			@foreach($maestros as $c)
				<option value="{{$c->id}}">{{$c->nombre}}</option>
			@endforeach
		</select>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>
@stop