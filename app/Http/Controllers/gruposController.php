<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Grupos;
use App\Maestros;
use App\Materias;
use DB;

class gruposController extends Controller
{
    public function registrar(){
    	$maestros=Maestros::all();
    	$materias=Materias::all();
    	//$alxgr=alumnoxgrupos::all();
    	return view('registrarGrupo',compact('maestros','materias'));
    }
    public function guardar(Request $datos){
    	$grupo=new Grupos();
    	$grupo->aula=$datos->input('aula');
    	$grupo->horario=$datos->input('horario');
    	$grupo->maestro_id=$datos->input('maestro');
    	$grupo->materia_id=$datos->input('materia');
    	$grupo->save();

    	return redirect('consultarGrupos');
    }
    public function consultar(){
    	$grupos=DB::table('grupos')
    	->join('maestros','grupos.maestro_id','=','maestros.id')
    	->join('materias','grupos.materia_id','=','materias.id')
     	->select('grupos.*','maestros.nombre AS maestro','materias.nombre AS materia')
    	->paginate(5);

    	return view('consultarGrupos',compact('grupos'));
    }
    public function eliminar($id){
      $grupos=Grupos::find($id);
      $grupos->delete();
      return redirect('consultarGrupos');
    }
      public function editar($id){
      $maestros=Maestros::all();
      $materias=Materias::all();
      $grupos=DB::table('grupos')
       ->where('grupos.id', '=', $id)
       ->join('maestros','grupos.maestro_id','=','maestros.id')
    	 ->join('materias','grupos.materia_id','=','materias.id')
     	 ->select('grupos.*','maestros.nombre AS maestro','materias.nombre AS materia')
         ->first();

      return view('editarGrupo', compact('grupos','maestros','materias'));
    }
   	public function actualizar($id, Request $datos){
      $grupos=Grupos::find($id);
      $grupos->aula=$datos->input('aula');
      $grupos->horario=$datos->input('horario');
      $grupos->maestro_id=$datos->input('maestro');
      $grupos->materia_id=$datos->input('materia');
      $grupos->save();

      return redirect('consultarGrupos');
   	}
}
