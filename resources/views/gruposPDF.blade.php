<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reporte de Grupos</title>
    <style>
      .encabezado{
        color: blue;
        background-color: black;
      }
    </style>
  </head>
  <body>
    <img src="img/logo.png" width="150px" alt="">
    <h1>Lista de grupos</h1>
    <hr>
    @foreach ($grupos as $g)
      {{$g->aula}}<br>
    @endforeach
  </body>
</html>

