@extends('master')
@section('contenido')
<form action="{{url('/actualizarGroupxAlumnos')}}/{{$grpxal->id_alumno}}&&{{$grpxal->id_grupo}}" method="POST">
	<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="alumno_id">Alumno:</label>
		<select name="alumno_id" class="form-control">
			<option value="{{$grpxal->id_alumno}}">{{$grpxal->alumno}}</option>
			@foreach($alumnos as $a)
				<option value="{{$a->id}}">{{$a->nombre}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="grupo">Grupo:</label>
		<select name="grupo" class="form-control">
			<!--option value="{{$grpxal->id_grupo}}">{{$grpxal->id_grupo}}</option-->
			<option value="{{$grpxal->id_grupo}}">{{$grpxal->aula}}</option>
			@foreach($grupos as $b)
				<!--option value="{{$b->id}}">{{$b->id}}</option-->
				<option value="{{$b->id}}">{{$b->aula}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="maestro">Maestro:</label>
		<select name="maestro" class="form-control">
			<option value="{{$grpxal->maestro_id}}">{{$grpxal->maestro}}</option>
			@foreach($maestros as $c)
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



