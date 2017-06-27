<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class materiasController extends Controller{
	public function cargar($id){
		$lista=DB::table('grupos')
		->join('alumnos_grupos','alumnos_grupos.grupo_id','=','grupos.id')
		->where('alumnos_grupos.alumno_id','<>',$id)
	}
}