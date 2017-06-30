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
      
      /*$titles = DB::table('alumnosxgrupos')
        ->join('grupos', 'alumnosxgrupos.id_grupo', '=', 'grupos.id')
        ->select('grupos.id')
        ->get();*/
        
      $alumnos=Alumnos::all();
      $maestros=Maestros::all();
      return view('registrarGrupoxAlumnos', compact('grupos','alumnos','maestros','titles'));
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
         ->join('maestros', 'alumnosxgrupos.maestro_id','=','maestros.id')
         ->select('alumnosxgrupos.*', 'alumnos.nombre AS alumno','grupos.aula as aula','maestros.nombre as maestro')
         ->paginate(5);
    return view('consultarGrupoxAlumnos', compact('grpxal'));
    }
    public function eliminar($id_alumno,$id_grupo){
      //dd($id_alumno,$id_grupo);
      $grpxal=DB::table('alumnosxgrupos')
       ->where('id_alumno','=',$id_alumno)
       ->where('id_grupo','=',$id_grupo)
       ->delete();
      return redirect('consultarGrupoxAlumnos');
    }
    public function editar($id_alumno,$id_grupo,$maestro_id){
      //dd($maestro_id);
      $grpxal=DB::table('alumnosxgrupos')
       ->where('id_alumno','=',$id_alumno)
       ->where('id_grupo','=',$id_grupo)
       ->where('grupos.maestro_id','=',$maestro_id)
       ->join('alumnos', 'alumnosxgrupos.id_alumno', '=', 'alumnos.id')
       ->join('grupos', 'alumnosxgrupos.id_grupo','=', 'grupos.id')
       ->join('maestros', 'alumnosxgrupos.maestro_id','=','maestros.id')         
       ->select('alumnosxgrupos.*', 'maestros.nombre AS maestro','alumnos.nombre AS alumno','grupos.aula AS aula')
       ->first();
      //$gruxma=DB::table('maestros')
       //->where('id','=',$maestro_id)
       dd($grpxal);
      $grupos=Grupos::all();
      $alumnos=Alumnos::all();
      $maestros=Maestros::all();

      return view('editarGroupxAlumnos', compact('grpxal','alumnos','maestros','grupos'));
    }
    public function actualizar($alumnoc,$grupoc,$maestroc,Request $datos){
      dd($grupoc);
      $a=$datos->input('alumno_id');
      $b=$datos->input('grupo');
      $c=$datos->input('maestro');
      $grpxal=Grpxal::where('id_alumno',$alumnoc)
      ->where('id_grupo',$grupoc)
      ->where('maestro_id',$maestroc)
      -> update(array('id_alumno'=>$a),array('id_grupo'=>$b),array('maestro_id',$c));

      return redirect('consultarGrupoxAlumnos');    
    }
    public function pdf(){
     $grpxal=Grpxal::all();
     $alumno=Alumnos::all();
     $maestros=Maestros::all();
     $vista=view('gruposXalumnosPDF',compact('grpxal'));
     $pdf=\App::make('dompdf.wrapper');
     $pdf->loadHTML($vista);
     return $pdf->stream('ListaMaestros.pdf');
   }
}
