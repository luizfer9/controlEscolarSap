<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GrpXal;
use App\Alumnos;
use DB;

class materiasController extends Controller{
	public function cargar($id){
        $alumno=Alumnos::find($id);
        $gruposid=DB::table('alumnosxgrupos')
            ->join('grupos', 'grupos.id', '=', 'alumnosxgrupos.id_grupo')
            ->where('alumnosxgrupos.id_alumno', '=', $id)
            ->pluck('grupos.id');
        $lista=DB::table('grupos')
            ->whereNotIn('grupos.id', $gruposid)
            ->join('maestros', 'maestros.id', '=', 'grupos.maestro_id')
            ->join('materias', 'materias.id', '=', 'grupos.materia_id')
            ->select('grupos.id AS id', 'materias.nombre AS materia', 'grupos.horario AS horario', 
            	'grupos.aula AS aula','maestros.nombre AS maestro','grupos.maestro_id AS maestro_id')
            ->get();
        $materias=DB::table('grupos')
            ->whereIn('grupos.id', $gruposid)
            ->join('maestros', 'maestros.id', '=', 'grupos.maestro_id')
            ->join('materias', 'materias.id', '=', 'maestros.materia_id')
            ->select('grupos.id', 'materias.nombre', 'grupos.horario', 'grupos.id', 'grupos.aula',
             'materias.nombre AS materia','maestros.nombre AS maestro')
            ->get();
        return view('cargarMaterias', compact('lista', 'materias', 'alumno'));
	}
    public function cargarGrupo($alumno,$grupo,$maestro_id){
        $datos=DB::table('grupos')
        	->where('id',"=",$grupo)
        	//->join('maestros','grupos.maestro_id','=','maestros.id')
        	->Select('grupos.maestro_id AS maestro','grupos.id AS id_grupo')
        	->get();
        $grpxal=new GrpXal();
        $grpxal->id_alumno=$alumno;
        $grpxal->id_grupo=$grupo;
       	$grpxal->maestro_id=$maestro_id;//$grpxal->maestro_id=$datos->input('maestro');
        $grpxal->save();
        return redirect('/cargarMaterias/'.$alumno);
    }
    public function bajaGrupo($id, $idg){
        DB::table('alumnos_grupos')
            ->where('alumnos_grupos.grupo_id', '=', $idg)
            ->where('alumnos_grupos.alumno_id', '=', $id)
            ->delete();
            return redirect('/cargarMaterias/'.$id);
    }
    public function capturarCalificaciones($idg){
        $alumnosGrupo=DB::table('alumnos_grupos')
            ->join('alumnos', 'alumnos.id', '=', 'alumnos_grupos.alumno_id')
            ->where('alumnos_grupos.grupo_id', '=', $idg)
            ->select('alumnos.nombre', 'alumnos.id', 'alumnos_grupos.calificacion')
            ->get();
        
        $datos=DB::table('grupos')
            ->where('grupos.id', $idg)
            ->join('materias', 'materias.id', 'grupos.materia_id')
            ->select('grupos.clave', 'grupos.id', 'materias.nombre')
            ->first();
        return view('capturarCalificaciones', compact('alumnosGrupo', 'datos'));
    }
    public function guardarCalificaciones($idg, Request $datos){
        $calificaciones=$datos->input('calificaciones');
        foreach ($calificaciones as $key => $value) {
            DB::table('alumnos_grupos')
                ->where('alumnos_grupos.grupo_id', '=', $idg)
                ->where('alumnos_grupos.alumno_id', '=', $key)
                ->update(['alumnos_grupos.calificacion' => $value]);
        }
        return redirect('/capturarCalificaciones/'.$idg);
    }
	
}