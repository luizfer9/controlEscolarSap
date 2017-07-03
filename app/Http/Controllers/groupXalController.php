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
         ->join('materias', 'grupos.materia_id','=','materias.id')
         ->select('alumnosxgrupos.*', 'alumnos.nombre AS alumno','grupos.aula as aula',
          'maestros.nombre as maestro','materias.nombre AS materia','grupos.materia_id','grupos.horario')
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
    public function editar($id_alumno,$id_grupo){
      $grpxal=DB::table('alumnosxgrupos')
       ->where('id_alumno','=',$id_alumno)
       ->where('id_grupo','=',$id_grupo)
       ->join('alumnos', 'alumnosxgrupos.id_alumno', '=', 'alumnos.id')
       ->join('grupos', 'alumnosxgrupos.id_grupo','=', 'grupos.id')
       ->join('maestros', 'grupos.maestro_id','=','maestros.id')         
       ->select('alumnosxgrupos.*', 'maestros.nombre AS nom_maestro','alumnos.nombre AS nom_alumno')
       ->first();

      $grupos=Grupos::all();
      $alumnos=Alumnos::all();
      $maestros=Maestros::all();

      return view('editarGroupxAlumnos', compact('grpxal','alumnos','maestros','grupos'));
    }
    public function actualizar($alumnoc,$grupoc,$maestroc,Request $datos){
      //dd($alumnoc);
      $a=$datos->input('alumno_id');
      $b=$datos->input('grupo');
      $c=$datos->input('maestro');
      $grpxal=Grpxal::where('id_alumno',$alumnoc)
      ->where('id_grupo',$grupoc)
      ->where('maestro_id',$maestroc)
      -> update(array('id_alumno'=>$a),array('id_grupo'=>$b),array('maestro_id',$c));
      flash('¡Se actualizado exitósamente los datos del grupo!')->success();

      return redirect('consultarGrupoxAlumnos');    
    }
    public function listagrupos(){
      $grpxal=DB::table('grupos')
       ->join('maestros', 'grupos.maestro_id','=','maestros.id')
       ->join('materias', 'grupos.materia_id','=','materias.id')
       ->select('grupos.id AS grupo','grupos.aula as aula','maestros.nombre as maestro',
        'materias.nombre AS materia','grupos.materia_id','grupos.horario')
       ->orderBy('grupos.id','asc')
       ->paginate(5);
      // dd($grpxal);
      return view('listaGrupos', compact('grpxal'));
    }
    public function pdf($idg){
      //dd($idg);
       $lista=DB::table('alumnosxgrupos')
            ->join('alumnos', 'alumnosxgrupos.id_alumno', '=', 'alumnos.id')
            ->join('carreras','alumnos.carrera_id','=','carreras.id')
            ->join('grupos','alumnosxgrupos.id_grupo','=','grupos.id')
            ->join('maestros','alumnosxgrupos.maestro_id','=','maestros.id')
            ->join('materias','grupos.materia_id','=','materias.id')
            ->where('alumnosxgrupos.id_grupo', '=', $idg)
            ->select('grupos.id','grupos.aula','maestros.nombre AS maestro','alumnosxgrupos.calificacion','alumnos.id AS alumnoID','alumnos.numero_control AS controlAlumno','alumnos.nombre AS alumno','materias.nombre AS materia','carreras.nombre AS carrera')
            ->orderBy('alumnos.id','asc')
            ->get();

      $vista=view('gruposXalumnosPDF', compact('lista'))->render();
      $pdf=\App::make('dompdf.wrapper');
      $pdf->loadHTML($vista);
      return $pdf->stream('ListasGruposxAlumnos.pdf');
   }
}
