@extends('master')

@section('contenido')
<form action="{{url('/guardarMaestro')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" required>
	</div>
	<div class="form-group">
		<label for="control">Número de Control:</label>
		<input type="text" class="form-control" name="control" required>
	</div>
	<div class="form-group">
		<label for="edad">Edad:</label>
		<input type="number" class="form-control" name="edad" required>
	</div>
	<div class="form-group">
		<label for="sexo">Sexo:</label>
		<select name="sexo" class="form-control">
			<option value="0" selected="">Femenino</option>
			<option value="1">Masculino</option>
		</select>
	</div>
	<div class="form-group">
		<label for="materia">Materia:</label>
		<select name="materia" class="form-control">
			@foreach($materias as $c)
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
