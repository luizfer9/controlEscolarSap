@extends('master')
@section('contenido')
<form action="{{url('/actualizarGrupo')}}/{{$grupos->id}}" method="POST">
	<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="aula">Aula:</label>
		<input type="text" class="form-control" name="aula" required value="{{$grupos->aula}}">
	</div>
	<div class="form-group">
		<label for="horario">Horario:</label>
		<input type="text" class="form-control" name="horario" required value="{{$grupos->horario}}">
	</div>
	<div class="form-group">
		<label for="maestro">Maestro:</label>
			<select name="maestro" class="form-control">
				<option value="{{$grupos->maestro_id}}">{{$grupos->maestro}}</option>
				@foreach($maestros as $c)
					<option value="{{$c->id}}">{{$c->nombre}}</option>
				@endforeach
			</select>	
	</div>
	<div class="form-group">
		<label for="materia">Materia:</label>
			<select name="materia" class="form-control">
				<option value="{{$grupos->materia_id}}">{{$grupos->materia}}</option>
				@foreach($materias as $c)
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