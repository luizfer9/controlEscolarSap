<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lista de Grupos</title>
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
    <h1 class="encabezado" >Lista de Grupos</h1>
    <table class="structure">
          <tr class="detayl">
            <th>ID</th>
            <th>Aula</th>
            <th>Horario</th>
            <th>Maestro</th>
            <th>Materia</th>
          </tr>
          @foreach($grupos as $a)
          <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->aula}}</td>
            <td>{{$a->horario}}</td>
            <td>{{$a->maestro}}</td>
            <td>{{$a->materia}}</td>
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
