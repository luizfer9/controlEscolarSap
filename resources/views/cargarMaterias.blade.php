@extends('master')
@section('contenido')

<h2> nombre: {{$alumno->nombre}}</h2>
	<hr>
		<!--form action="{{url('/cargarGrupo')}}/{{$alumno->id}}" method="POST"-->
			<div class="form-group">
				<label for="materia">Selecciona la materia:  Materia  --  Aula  --  Horario</label>
				<select name="materia" class="form-control">
				<option value="0">Selecciona la materia</option>
				@foreach($lista as $m)
					<option value="{{$m->grupoid}}">
						<table class="table table-striped">
							<tr>
								<th>{{$m->materia}}---------------------</th>
								<th>{{$m->aula}}---------------------</th>
								<th>{{$m->horario}}---------------------</th>
								<th>{{$m->maestro}}</th>
							</tr>
						</table>
					</option>
				@endforeach
				</select>
			</div>
			<div>
				<a href="{{url('/cargarGrupo')}}/{{$alumno->id}}&&{{$m->grupoid}}&&{{$m->maestro_id}}" class="btn btn-primary">Cargar grupo</a>
				<a href="{{url('/consultarAlumnos')}}" class="btn btn-danger">Cancelar</a>
			</div>
		<!--/form-->
	<h2>Materias Cargadas</h2>
<hr>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-striped">
			<thead>
				<tr>
						<th>Clave materia</th>
						<th>Nombre</th>
						<th>Clave grupo</th>
						<th>Aula</th>
						<th>Horario</th>
						<th>Maestro</th>
						<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
			@foreach($materias as $mt)
				<tr>
					<td>{{$mt->materia}}</td>
					<td>{{$mt->nombre}}</td>
					<td>{{$mt->id}}</td>
					<td>{{$mt->aula}}</td>
					<td>{{$mt->horario}}</td>
					<td>{{$mt->maestro}}</td>
					<td>
						
						<a href="{{url('/consultarAlumnos')}}" class="btn btn-info btn-xs">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
						</a>
						<a href="{{url('/consultarGrupoxAlumnos')}}" class="btn btn-danger btn-xs">
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