<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Grpxal;
use App\Alumnos;
use App\Grupos;
use App\Maestros;
use DB;

class groupXalController extends Controller
{
    public function registrar(){
   		$grupos=Grupos::all();
   		$alumnos=Alumnos::all();
      $maestros=Maestros::all();
   		return view('registrarGrupoxAlumnos', compact('grupos','alumnos','maestros'));
   	}
    public function guardar(Request $datos){
      $grpxal= new Grpxal();
      $grpxal->id_alumno=$datos->input('alumno');
      $grpxal->id_grupo=$datos->input('grupo');
      $grpxal->maestro_id=$datos->input('maestro');
      $grpxal->save();

      return redirect('/consultarGrupoxAlumnos');
    }
   public function consultar(){
      $grpxal=DB::table('alumnosxgrupos')
         ->join('alumnos', 'alumnosxgrupos.id_alumno', '=', 'alumnos.id')
         ->join('grupos', 'alumnosxgrupos.id_grupo','=', 'grupos.id')
         ->join('maestros', 'grupos.maestro_id','=','maestros.id')
         ->select('alumnosxgrupos.*', 'alumnos.nombre AS alumno','grupos.aula as aula','maestros.nombre as maestro')
         ->paginate(5);

    return view('consultarGrupoxAlumnos', compact('grpxal'));
   }
    /*public function eliminar($a){
      $grpxal=DB::table('alumnosxgrupos')
          ->where('id_alumno={$a->id_alumno} && id_grupo={$a->id_grupo} && maestro_id={$a->maestro->id}')
          ->delete();
      return redirect('consultarGrupoxAlumnos');
    }*/
}
