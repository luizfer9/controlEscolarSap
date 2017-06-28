<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reporte de Maestros</title>
    <style>
      .encabezado{
        color: blue;
        background-color: black;
      }
    </style>
  </head>
  <body>
    <img src="img/logo.png" width="150px" alt="">
    <h1>Lista de maestros</h1>
    <hr>
    @foreach ($maestros as $m)
      {{$m->nombre}}<br>
    @endforeach
  </body>
</html>
