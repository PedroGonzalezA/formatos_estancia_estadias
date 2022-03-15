<?php

namespace App\Http\Controllers;

use App\Models\cedula_registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Barryvdh\DomPDF\Facade as PDF;
class documentosEstadiaAdminController extends Controller
{
    public function ver(){
        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')

        ->get();

        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso','3')
        ->get();

        $users   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];

        
        $datos = Arr::collapse([$users,$docs]);
        
        return view('admin.documentosEstadia',['documentos'=>$datos,]);
    }

    public function ver_cd_estadia_f03_admin($idU,$id,$name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        return response()->file($nombreD);

    }
    public function aceptar_estadia_f03_admin($idU,$id,$name) {
        $carta=cedula_registro::find($id);
        $carta->estado_c_r=2;
        $carta->save();
         return redirect('estadia_Documentos');
    }
    public function pendiente_estadia_f03_admin($idU,$id,$name) {
        $carta=cedula_registro::find($id);
        $carta->estado_c_r=1;
        $carta->save();
         return redirect('estadia_Documentos');
    }
    public function conObservaciones_estadia_f03_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=cedula_registro::find($id_c);
        return view('admin.conObservaciones',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estadia_f03_admin(Request $request) {
        $id_c   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estadia_f03_admin(Request $request,$id){
        $observacion= $request->input('observaciones');
        $carta=cedula_registro::find($id);
        $carta->estado_c_r=0;
        $carta->observaciones_c_r=$observacion;
        $carta->save();
        return redirect('estadia_Documentos');
    }
    
    public function buscador(Request $request){        
        $texto   =trim($request->get('texto'));

        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->where('alumno.nombres','LIKE','%'.$texto.'%')
        ->orWhere('alumno.ape_paterno','LIKE','%'.$texto.'%')
        ->orWhere('alumno.ape_materno','LIKE','%'.$texto.'%')
        ->orWhere('alumno.matricula','LIKE','%'.$texto.'%')
        ->orWhere('carreras.nombre_carrera','LIKE','%'.$texto.'%')
        ->where('alumno.id_procesos','3')
        ->get();

        
        
        $nombres=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso','3')
        ->get();
        return view('nombres.paginas',['nombres'=>$nombres,'texto'=>$texto,'documentos'=>$users,]);
    }
}
