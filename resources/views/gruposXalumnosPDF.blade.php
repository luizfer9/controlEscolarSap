<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lista de Alumnos por Grupo</title>
  <img src="img/logo.png" width="150px">
  <style>

    table{
      border-collapse: collapse;
      width: 100%;
    }
    .encabezado{
      color: black;
      background-color: white;
      border-color: gray;
      border: 2px solid;
      border-radius: 5px;
      padding: 5px;
      height: 15px;
      font-size: 15px;
      font-weight: 12px;
    }
    .structure, th, td {
      background-color: #f2f2f2;
      border-bottom: 1px solid ;
      height: 8px;
      text-align: left;
    }
    
  </style>
</head>
  <body>
    <h1 class="encabezado" >Lista de Alumnos</h1>
    <td>ID Grupo: </td>
    <td>Aula: </td>
    <td>Maestro: </td>
    <table class="structure">
          <tr class="detayl">
            <th>ID</th>
            <th>Alumno</th>
            <th>Número de control</th>
            <th>Carrera</th>
          </tr>
          @foreach($lista as $a)
          <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->nombre}}</td>
            <td>{{$a->numero_control}}</td>
            <td>{{$a->carrera}}</td>
            <td>
          </tr>
          @endforeach
      </thead>
    </table>
    <footer class="text-center">
  <hr>
  Ing. Web &copy; 2017 
</footer>
  </body>
</html>
