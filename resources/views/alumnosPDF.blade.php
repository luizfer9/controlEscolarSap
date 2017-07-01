<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <img src="img/logo.png" width="150px" alt="">
  <title>Lista de Alumnos</title>
  <style>
    .encabezado{
      color: white;
      background-color: black;
    }
  </style>
</head>
  <body>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Número de control</th>
          <th>Edad</th>
          <th>Sexo</th>
          <th>Carrera</th>
        </tr>
        <img src="img/logo.png" width="150px" alt="">
          <h1 class="encabezado">Lista de alumnos</h1>
          <br>
          @foreach($alumnos as $a)
          <tr>
            <td>{{$a->id_alumno}}</td>
            <td>{{$a->nombre}}</td>
            <td>{{$a->numero_control}}</td>
            <td>{{$a->edad}}</td>
            <td>{{$a->sexo}}</td>
            <td>{{$a->carrera}}</td>
            <td>
          </tr>
          @endforeach
      </thead>
    </table>
  </body>
</html>
<!--DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>lista datos alumnos</title>
    <style>
      .encabezado{
        color: blue;
        background-color: black;
      }
    </style>
  </head>
  <body>
    <img src="img/logo.png" width="150px" alt="">
    <h1>Lista de Alumnos</h1>
    <hr>
    <tr>
      <th>ID</th>
      <th>Alumno</th>
      <th>Numero de control</th>
      <th>Edad</th>
      <th>Sexo</th>
      <th>Carrera</th>
    </tr><
    @foreach ($alumnos as $g)
      {{$g->id_alumno}}<br>
      {{$g->nombre}}<br>
      {{$g->numero_control}}<br>
      {{$g->edad}}<br>
      {{$g->sexo}}<br>
      {{$g->carrera}}<br>
    @endforeach>
  </body>
</html>


//hacer pdf en materias y en maestros. Grupos y materias para miercoles.
//Imagenes van en la carpeta public(para generar la lista de gpos en el pdf)-->
