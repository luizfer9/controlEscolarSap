<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumnos;
use DB;

class materiasController extends Controller{
	public function cargar($id){
		$alumnos=Alumnos::all();
		$gruposid=DB::table('alumnos_grupos')
		->join('grupos','grupos.id','=','alumnos_grupos.id')
		->where('alumno_id.alumno_id','=',$id)
		->pluck('grupos.id');

		$grupos=DB::table('grupos') //consulta donde no esta el alumno
		->whereNotIn('id',$grupos.id)
		->join('maestros','maestros.id','=','grupos.maestros_id')
		->join('materias','maestros.id','=','materias.maestros_id')
		->select('grupos.id','materias.nombre','grupos.hora','grupos.clave')
		-get();

		$materias=DB::table('materias') //materias donde no esta el laumno
		->whereIn('grupos.id',$gruposid)
		->join('materias','materias.id','=','materias.maestros_id')
		->join('maestros','maestros.id','=','materias.maestros_id')
		->select('grupos.id','materias.nombre','grupos.hora','grupos.clave')
		-get();

		return view('cargarMaterias',)
	}
}