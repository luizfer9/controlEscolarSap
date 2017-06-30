<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reporte de Alumnos</title>
    <style>
      .encabezado{
        color: blue;
        background-color: black;
      }
    </style>
  </head>
  <body>
    <img src="img/logoTec.jpg" width="150px" alt="">
    <h1 class="encabezado">Lista de alumnos</h1>
    <hr>
    @foreach ($alumnos as $a)
      {{$a->nombre}}<br>
    @endforeach
  </body>
</html>
//hacer pdf en materias y en maestros. Grupos y materias para miercoles.
//Imagenes van en la carpeta public(para generar la lista de gpos en el pdf)
