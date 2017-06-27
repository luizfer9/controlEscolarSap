extends('master')
@section('contenido')
<h2> nombre: {{$alumno->nombre}}</h2>
<hr>
<div class="form-group">
	<label for="materia">Selecciona la materia:</label>
	<select name="materia" class="form-control">
	<option value="0">Selecciona la materia</option>
	@foreach($lista as $m)
		<option value="{{$m-id}}">{{"$m->nombre"}}{{$m->grupo}}{{$m->hora}}</option>
	@endforeach
	</select>
</div
<h2>Materias Cargadas</h2>
<hr>
<div class="row">
	<div class="col-xs-12">
		<table class="talbe table-striped">
			<thead>
				<tr>
						<th>Clave</th>
						<th>Nombre</th>
						<th>Grupo</th>
						<th>Clave</th>
						<th>Aula</th>
						<th>Horario</th>
						<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			foreach($materias as $mt)
				<tr>
					<td>{{$mt->mc</td>
					<td>{{$mt->nombre</td>
					<td>{{$mt->clave</td>
					<td>{{$mt->aula</td>
					<td>{{$mt->hora</td>
					<td>
						<a href="{{url('/eliminarAlumno')}}/{{$a->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
						</a>					
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>	
</div>
@stop