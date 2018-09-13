<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Proveedor;


class ProveedorController extends Controller
{

    public function __construct()
    {
     //   $this->middleware('auth:teacher');
    }

    public function index()
    {
    }
    public function listaAlumnos($id)
    {
        $curso = Curso::find($id);
        $alumnos = User::where('curso_id', $id)->get();

        return view('teacher.listaAlumnos')->with([
            'curso' => $curso,
            'alumnos' => $alumnos,
        ]);
    }
    public function verAlumno($id)
    {
        $alumno = User::find($id);
        $cursos = Curso::where('id', $alumno->curso_id )->get();

        return view('teacher.verAlumno')->with([
            'cursos' => $cursos,
            'alumno' => $alumno,
        ]);
    }
    public function crearInforme($id)
    {
        $alumno = User::find($id);

        return view('teacher.informe-personalidad')->with([
            'alumno' => $alumno,

        ]);
    }
    public function listarInforme($id)
    {
        $alumno = User::find($id);
        $anotaciones = Anotacion::where('user_id', $alumno->id)->get();
        return view('teacher.lista-inf-perso')->with([
            'alumno' => $alumno,
            'anotaciones' => $anotaciones,
        ]);
    }
    public function subject($id)
    {
        $asignatura=Asignatura::find($id);
        $unidades=Unidad::where('asignatura_id',$asignatura->id)->get();

        return view('teacher/subject')->with([
            'asignatura'=> $asignatura,
            'unidades'=> $unidades,
        ]);
    }

    public function activity_calendar(){

        $profesor= Teacher::find(Auth::user()->id);
        $calendario = Calendar::where('id_teacher', $profesor->id)->get()->toArray();

        $asignaturas_profesor = Asignatura::where('teacher_id',$profesor->id)->get()->toArray();

        //solo interesan los cursos donde el profesor tenga asignaturas
        foreach($asignaturas_profesor as $asignatura){
            $current_curso = Curso::where('id',$asignatura['curso_id'])->get()->toArray();
            $cursos_profesor[$current_curso['0']['id']] = $current_curso['0'];
        }


        //Obtenemos el curso asociado a la actividad de calendario y se guardan los datos en el arreglo del calendario
        for ($i=0; $i<count($calendario); $i++) {
            $calendario[$i]['data_curso'] = Curso::where('id', $calendario[$i]['id_curso'])->get()->toArray();
        }

        return view('teacher/activityCalendar')->with([
            'teacher' => $profesor,
            'calendario' => $calendario,
            'cursos_profesor' => $cursos_profesor,
        ]);
    }

    public function add_activity_calendar(Request $request){

            //$this->activity_calendar_validator($request->all())->validate();

            $actividad = new Calendar;
            $actividad->titulo = $request->titulo;
            $actividad->fecha = $request->fecha;
            $actividad->hora_inicio = $request->hora_inicio;
            $actividad->hora_fin = $request->hora_termino;
            $actividad->id_curso =  $request->curso;
            $actividad->id_teacher = Auth::user()->id;


            $actividad->save();

            return redirect(route('teacher.activity_calendar'));

    }

    /*protected function activity_calendar_validator(array $data){
        return Validator::make($data, [
            'teacher_id' => 'required|string|max:255',
            'numero' => 'required|integer|max:8',
            'letra' => 'required|string|max:1',

        ]);
    }*/
}
