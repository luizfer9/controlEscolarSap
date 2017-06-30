<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Maestros;
use App\Materias;
use DB;

class maestrosController extends Controller
{

   public function registrar(){
   		$materias=Materias::all();
      	return view('registrarMaestro', compact('materias'));
   }

   public function guardar(Request $datos){
   		$maestro= new Maestros();
   		$maestro->nombre=$datos->input('nombre');
   		$maestro->numero_control=$datos->input('control');
   		$maestro->edad=$datos->input('edad');
   		$maestro->sexo=$datos->input('sexo');
   		$maestro->materia_id=$datos->input('materia');
   		$maestro->save();
         flash('¡Se guardaron exitósamente los datos del maestro!')->success();

   		return redirect('/consultarMaestro');
   }

   public function consultar(){
   		//$alumnos=Alumnos::paginate(5);
      $maestro=DB::table('maestros')
         ->join('materias', 'maestros.materia_id', '=', 'materias.id')
         ->select('maestros.*', 'materias.nombre AS materia')
         ->paginate(5);

   	return view('consultarMaestro', compact('maestro'));
   }

   public function eliminar($id){
      $maestro=Maestros::find($id);
      $maestro->delete();
      return redirect('consultarMaestro');
   }

   public function editar($id){
      $maestro=DB::table('maestros')
         ->where('maestros.id', '=', $id)
         ->join('materias', 'maestros.materia_id', '=', 'materias.id')
         ->select('maestros.*', 'materias.nombre AS materia')
         ->first();
      $materias=Materias::all();

      return view('editarMaestro', compact('maestro', 'materias'));
   }

   public function actualizar($id, Request $datos){
      $maestro=Maestros::find($id);
      $maestro->nombre=$datos->input('nombre');
      $maestro->numero_control=$datos->input('control');
      $maestro->edad=$datos->input('edad');
      $maestro->sexo=$datos->input('sexo');
      $maestro->materia_id=$datos->input('materia');
      $maestro->save();

      return redirect('consultarMaestro');
   }
   public function pdf(){
     $maestros=Maestros::all();
     $vista=view('maestrosPDF',compact('maestros'));
     $pdf=\App::make('dompdf.wrapper');
     $pdf->loadHTML($vista);
     return $pdf->stream('ListaMaestros.pdf');
   }
}

