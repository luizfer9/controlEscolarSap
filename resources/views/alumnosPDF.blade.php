<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" method="POST">
	<title>Reporte de Alumos</title>
	<style>
		.encabezado{
			color:white;
			background-color:black;
		}
	</style>
	</head>
	<body>
		<h1>Lista de alumnos</h1>
		<hr>
		@foreach($alumnos as $a)
			{{$a->nombre}} <br>
		@endforeach
	</body>
</html>
