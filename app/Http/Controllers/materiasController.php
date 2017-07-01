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
        DB::table('alumnosxgrupos')
            ->where('alumnosxgrupos.id_grupo', '=', $idg)
            ->where('alumnosxgrupos.id_alumno', '=', $id)
            ->delete();
            return redirect('/cargarMaterias/'.$id);
    }
    public function capturarCalificaciones($idg){
        //dd($idg);
        $alumnosGrupo=DB::table('alumnosxgrupos')
            ->join('alumnos', 'alumnos.id', '=', 'alumnosxgrupos.id_alumno')
            ->where('alumnosxgrupos.id_grupo', '=', $idg)
            ->select('alumnos.nombre AS alumno', 'alumnos.id', 'alumnosxgrupos.calificacion')
            ->get();
        
        $datos=DB::table('grupos')
            ->where('grupos.id','=', $idg)
            ->join('materias', 'materias.id', 'grupos.materia_id')
            ->select('grupos.aula AS aula', 'grupos.id AS grupo', 'materias.nombre AS materia')
            ->first();
        return view('capturarCalificaciones', compact('alumnosGrupo', 'datos'));
    }
    public function guardarCalificaciones($idg, Request $datos){
        //dd($datos);
        $calificaciones=$datos->input('calificacion');
        $alumno=$datos->input('alumno');
        foreach ($calificaciones as $key => $value) {
            DB::table('alumnosxgrupos')
                ->where('alumnosxgrupos.id_grupo', '=', $idg)
                ->where('alumnosxgrupos.id_alumno', '=', $key)
                ->update(['alumnosxgrupos.calificacion' => $value]);
            flash('¡Se guardo exitósamente la calificacion!')->success();

        }
        return redirect('/capturarCalificaciones/'.$idg);
    }
	
}