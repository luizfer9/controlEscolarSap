<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Alumnos</title>
  <style>
    .encabezado{
      color: white;
      background-color: black;
    }
  </style>
</head>
<body>
<img src="img/logo.png" width="150px" alt="">
  <h1 class="encabezado">Lista de alumnos</h1>
  <hr>
  @foreach($grpxal as $a)
    {{$a->id_alumno}} <br>
  @endforeach
</body>
</html>

