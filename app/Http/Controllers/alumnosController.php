<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use App\Alumnos;
use App\GrpXal;
use DB;

class alumnosController extends Controller
{
   public function registrar(){
   		$carreras=Carreras::all();
   		return view('registrarAlumno', compact('carreras'));
   }

   public function guardar(Request $datos){
   		$alumno= new Alumnos();
   		$alumno->nombre=$datos->input('nombre');
   		$alumno->numero_control=$datos->input('control');
   		$alumno->edad=$datos->input('edad');
   		$alumno->sexo=$datos->input('sexo');
   		$alumno->carrera_id=$datos->input('carrera');
   		$alumno->save();
         flash('¡Se guardaron exitósamente los datos del alumno!')->success();
   		return redirect('/consultarAlumnos');

   }

   public function consultar(){
      $alumnos=DB::table('alumnos')
         ->join('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
         ->select('alumnos.*', 'carreras.nombre AS nom_carrera')
         ->paginate(5);

   	return view('consultarAlumnos', compact('alumnos'));
   }

   public function eliminar($id){
      $alumno=Alumnos::find($id);
      $alumno->delete();
      flash('¡Se elimino exitósamente el registro del alumno!')->success();

      return redirect('consultarAlumnos');
   }

   public function editar($id){
      $alumno=DB::table('alumnos')
         ->where('alumnos.id', '=', $id)
         ->join('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
         ->select('alumnos.*', 'carreras.nombre AS nom_carrera')
         ->first();
      $carreras=Carreras::all();
      flash('¡Se editaron exitósamente los datos del alumno!')->success();

      return view('editarAlumno', compact('alumno', 'carreras'));
   }

   public function actualizar($id, Request $datos){
      $alumno=Alumnos::find($id);
      $alumno->nombre=$datos->input('nombre');
      $alumno->numero_control=$datos->input('control');
      $alumno->edad=$datos->input('edad');
      $alumno->sexo=$datos->input('sexo');
      $alumno->carrera_id=$datos->input('carrera');
      $alumno->save();
      flash('¡Se actualizaron exitósamente los datos del alumno!')->success();

      return redirect('consultarAlumnos');
   }
   
   public function pdf(){
      $alumnos=DB::table('alumnos')
         ->join('carreras','alumnos.carrera_id','=','carreras.id')
         ->select('alumnos.*','carreras.nombre AS carrera')
         ->orderBy('alumnos.id','asc')
         ->get();
      //dd($alumnos);
      $vista=view('alumnosPDF', compact('alumnos'));
      $pdf=\App::make('dompdf.wrapper');
      $pdf->loadHTML($vista);
      return $pdf->stream('ListaAlumnos.pdf');
   }
   public function kardex($idg){
      $alumnos=DB::table('alumnosxgrupos')
         ->join('alumnos','alumnosxgrupos.id_alumno', '=','alumnos.id')
         ->join('carreras','alumnos.carrera_id','=','carreras.id')
         ->join('grupos','alumnosxgrupos.id_grupo','=','grupos.id')
         ->join('maestros','alumnosxgrupos.maestro_id','=','maestros.id')
         ->join('materias','grupos.materia_id','=','materias.id')
         ->where('alumnosxgrupos.id_alumno', '=', $idg)
         ->select('grupos.id','grupos.aula','alumnosxgrupos.calificacion','maestros.nombre AS maestro','alumnos.id AS alumnoID','alumnos.numero_control AS controlAlumno','alumnos.nombre AS alumno','materias.nombre AS materia','carreras.nombre AS carrera')
         ->get();
      //dd($alumnos);
      $vista=view('kardexPDF', compact('alumnos'));
      $pdf=\App::make('dompdf.wrapper');
      $pdf->loadHTML($vista);
      return $pdf->stream('Kardex.pdf');
   }
}