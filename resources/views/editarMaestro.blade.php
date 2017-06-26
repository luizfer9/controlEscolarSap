@extends('master')
@section('contenido')
<form action="{{url('/actualizarMaestro')}}/{{$maestro->id}}" method="POST">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre"required value="{{$maestro->nombre}}">
	</div>
	<div class="form-group">
		<label for="control">Número de Control:</label>
		<input type="text" class="form-control" name="control" required value="{{$maestro->numero_control}}">
	</div>
	<div class="form-group">
		<label for="edad">Edad:</label>
		<input type="number" class="form-control" name="edad" required value="{{$maestro->edad}}">
	</div>
	<div class="form-group">
		<label for="sexo">Sexo:</label>
		<select name="sexo" class="form-control">
			@if($maestro->sexo==0)
			<option value="0" selected>Mujer</option>
			<option value="1">Masculino</option>
			@else
			<option value="0">Femenino</option>
			<option value="1"selected>Masculino</option>
			@endif
		</select>
	</div>

	<div class="form-group">
		<label for="materia">Materia:</label>
		<select name='materia' class="form-control">
			<option value="{{$maestro->materia_id}}">{{$maestro->materia}}</option>
			@foreach($materias as $mat)
				<option value="{{$mat->id}}">{{$mat->nombre}}</option>
			@endforeach
		</select>
	</div>

<div>
	<button type="submit" class="btn btn-primary">Actualizar</button>
	<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
</div>
</form>
@stop
