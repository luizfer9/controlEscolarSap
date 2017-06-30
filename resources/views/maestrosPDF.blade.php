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
  <style>
    .tabla{
      background: lightgray;
      border-radius: 3;
    }
    
  </style>
  <body>
  <h4 align="right">Instituto Tecnologico de Culiacan</h4>
  <hr>
    <img src="img/logoTec.jpg" width="150px" alt="">
    <h1 class="encabezado">Lista de maestros</h1>
    <hr>
    @foreach ($maestros as $m)
    {{$m->nombre}}<br>
   @endforeach
   
<table  align="center" class="tabla" border="1">

<tr>
  <th>Dia</th>
  <br>
  <th>Materia</th>
  <th>Hora</th>
</tr>
<tr>
<th>Lunes</th>
<td>Tesebada</td>
<td>
@foreach ($maestros as $m)
      {{$m->nombre}}<br>
    @endforeach
  </td>
<td>7:00-8:00 a.m</td>
</tr>
<tr>
<th>Martes</th>
<td>Prog. Web</td>
<td>11:00-12:00 am.</td>
</tr>
<tr>
<td>Miercoles</td>
<td>Pruebas de Software</td>
<td>9:00-10:00 am.</td>
</tr>
<tr>
<td>Jueves</td>
<td>Lenguajes automatas 2</td>
<td>8:00-9:00 am.</td>
</tr>
<tr>
<td>Viernes</td>
<td>Ecuaciones diferenciales</td>
<td>3:00-4:00 pm.</td>
</tr>
</table>
<br>
<table border="1" align="center">

<tr>
  <td>Dia</td>
  <td>Materia</td>
  <td>Hora</td>
</tr>
<tr>
<td>Lunes</td>
<td>Tesebada</td>
<td>7:00-8:00 a.m</td>
</tr>
<tr>
<td>Martes</td>
<td>Prog. Web</td>
<td>11:00-12:00 am.</td>
</tr>
<tr>
<td>Miercoles</td>
<td>Pruebas de Software</td>
<td>9:00-10:00 am.</td>
</tr>
<tr>
<td>Jueves</td>
<td>Lenguajes automatas 2</td>
<td>8:00-9:00 am.</td>
</tr>
<tr>
<td>Viernes</td>
<td>Ecuaciones diferenciales</td>
<td>3:00-4:00 pm.</td>
</tr>
</table>

  </body>
</html>
