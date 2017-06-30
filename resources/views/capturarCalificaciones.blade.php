@extends('master')

@section('contenido')
@include('flash::message')
<table class="table table-striped">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<form action="{{url('/guardarCalificaciones')}}/{{$datos->grupo}}" method="POST">
				<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
				<thead>
					<tr>
						<th>Grupo: </th>
						<td>{{$datos->grupo}}</td>

						<th>Materia: </th>
						<td>{{$datos->materia}}</td>
					<hr>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Alumnos</th>
							<th>Calificación</th>
						</tr>
					</thead>
					<tbody>
					@foreach($alumnosGrupo as $ag)
						<tr>
							<td>{{$ag->alumno}}</td>
							<td>
								<input class="form-control" type="number" name="calificacion[]" required value="{{$ag->calificacion}}">
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div>
				<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<script type="text/javascript">
            setTimeout(function() {
                $(".alert").fadeOut(1500);
            },1500);
</script>
@stop
