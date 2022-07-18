<?php

namespace App\Http\Controllers;

use App\Models\carga_horaria;
use App\Models\carta_aceptacion;
use App\Models\carta_liberacion;
use App\Models\carta_presentacion;
use App\Models\carta_responsiva;
use App\Models\cedula_registro;
use App\Models\constancia_derecho;
use App\Models\definicion_proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Barryvdh\DomPDF\Facade as PDF;

use function PHPUnit\Framework\fileExists;

class documentosEstadiaAdminController extends Controller
{
    public function ver(){
        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->where('alumno.id_procesos','3')
        ->get();

        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->where('documentos.id_proceso','3')
        ->get();

        $users   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];
        $datos = Arr::collapse([$users,$docs]);
        
        $doc_f02 = DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_aceptacion','documentos.id_c_aceptacion','=','carta_aceptacion.id')
        ->where('documentos.id_proceso','3')
        ->get();

        $doc_f04=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','documentos.id_d_proyecto','=','definicion_proyecto.id')
        ->where('documentos.id_proceso','3')
        ->get();

        $c_a   = ['carta_aceptacion' => $doc_f02];
        $d_p   = ['definicion_proyecto' => $doc_f04];
        $datos1 = Arr::collapse([$c_a,$d_p]);

        $doc_f03=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $doc_f05=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','documentos.id_c_liberacion','=','carta_liberacion.id')
        ->where('documentos.id_proceso','3')

        ->get();
        $c_l   = ['carta_liberacion' => $doc_f05];
        $c_r   = ['cedula_registro' => $doc_f03];
        $datos2 = Arr::collapse([$c_l,$c_r]);

        $doc_carta_presentacion=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_presentacion','documentos.id_c_presentacion','=','carta_presentacion.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $doc_carga_horaria=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carga_horaria','documentos.id_c_horaria','=','carga_horaria.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $c_p   = ['carta_presentacion' => $doc_carta_presentacion];
        $c_h   = ['carga_horaria' => $doc_carga_horaria];
        $datos3 = Arr::collapse([$c_p,$c_h]);

        $doc_constancia_derecho=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('constancia_derecho','documentos.id_c_derecho','=','constancia_derecho.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $doc_carta_responsiva=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_responsiva','documentos.id_c_responsiva','=','carta_responsiva.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $c_d   = ['constancia_derecho' => $doc_constancia_derecho];
        $c_res   = ['carta_responsiva' => $doc_carta_responsiva];
        $datos4 = Arr::collapse([$c_d,$c_res]);

        return view('admin.documentosEstadia',['documentos'=>$datos,'documentos1'=>$datos1,'documentos2'=>$datos2,'documentos3'=>$datos3,'documentos4'=>$datos4]);
    }

    //carga_horaria
    public function ver_cd_estadia_carga_horaria_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        $resp=file_exists($nombreD);
        if($resp==true){
            return response()->file($nombreD);
        }else
        {
            return redirect('estadia_Documentos')->with('sinRespuesta',' Carga horaria no ha sido encontrado');
        }
    }

    public function aceptar_estadia_carga_horaria_admin($idU,$id,$name) {
        $carta=carga_horaria::find($id);
        $carta->estado_c_h=2;
        $carta->save();
        $resp='Carga horaria Aceptada y '.CorreoController::store($idU, "Carga Horaria",1);
         return redirect('estadia_Documentos')->with('aceptado',$resp);
    }
    
    public function pendiente_estadia_carga_horaria_admin($idU,$id,$name) {
        $carta=carga_horaria::find($id);
        $carta->estado_c_h=1;
        $carta->save();
         return redirect('estadia_Documentos')->with('pendiente','Carga horaria Pendiente');
    }
    public function conObservaciones_estadia_carga_horaria_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=carga_horaria::find($id_c);
        return view('admin.conObservaciones_estadia_carga_horaria',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estadia_carga_horaria_admin(Request $request, $idU) {
        $id_c   = ['id_c'=>$request->input('id_c'), 'idU'=>$idU];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estadia_carga_horaria',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estadia_carga_horaria_admin(Request $request,$id,$idU){
        $observacion= $request->input('observaciones');
        $carta=carga_horaria::find($id);
        $carta->estado_c_h=0;
        $carta->observaciones_c_h=$observacion;
        $carta->save();
        $resp='Carga horaria Con Observacion y '.CorreoController::store($idU, 'Carga Horaria',2 );
        return redirect('estadia_Documentos')->with('observaciones',$resp);
    }
    
    //constancia_derecho
    public function ver_cd_estadia_constancia_derecho_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        $resp=file_exists($nombreD);
        if($resp==true){
            return response()->file($nombreD);
        }else
        {
            return redirect('estadia_Documentos')->with('sinRespuesta',' Constancia derecho no ha sido encontrado');
        }
    }

    public function aceptar_estadia_constancia_derecho_admin($idU,$id,$name) {
        $carta=constancia_derecho::find($id);
        $carta->estado_c_d=2;
        $carta->save();
        $resp='Constancia de Derecho Aceptada y '.CorreoController::store($idU, "Constancia de Derecho",1);
         return redirect('estadia_Documentos')->with('aceptado',$resp);
    }
    
    public function pendiente_estadia_constancia_derecho_admin($idU,$id,$name) {
        $carta=constancia_derecho::find($id);
        $carta->estado_c_d=1;
        $carta->save();
         return redirect('estadia_Documentos')->with('pendiente','Constancia derecho Pendiente');
    }
    public function conObservaciones_estadia_constancia_derecho_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=constancia_derecho::find($id_c);
        return view('admin.conObservaciones_estadia_constancia_derecho',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estadia_constancia_derecho_admin(Request $request, $idU) {
        $id_c   = ['id_c'=>$request->input('id_c'), 'idU'=>$idU];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estadia_constancia_derecho',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estadia_constancia_derecho_admin(Request $request,$id, $idU){
        $observacion= $request->input('observaciones');
        $carta=constancia_derecho::find($id);
        $carta->estado_c_d=0;
        $carta->observaciones_c_d=$observacion;
        $carta->save();
        $resp='Constancia de Derecho con observacion y '.CorreoController::store($idU, "Constancia de Derecho",2);
        return redirect('estadia_Documentos')->with('observaciones',$resp);
    }

    //carta_responsiva
    public function ver_cd_estadia_carta_responsiva_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        $resp=file_exists($nombreD);
        if($resp==true){
            return response()->file($nombreD);
        }else
        {
            return redirect('estadia_Documentos')->with('sinRespuesta',' Carta responsiva no ha sido encontrado');
        }
    }

    public function aceptar_estadia_carta_responsiva_admin($idU,$id,$name) {
        $carta=carta_responsiva::find($id);
        $carta->estado_c_r=2;
        $carta->save();
        $resp='Carta Resposiva Aceptada y '.CorreoController::store($idU, "Carta Resposiva",1);
         return redirect('estadia_Documentos')->with('aceptado',$resp);
    }
    
    public function pendiente_estadia_carta_responsiva_admin($idU,$id,$name) {
        $carta=carta_responsiva::find($id);
        $carta->estado_c_r=1;
        $carta->save();
         return redirect('estadia_Documentos')->with('pendiente','Carta responsiva Pendiente');
    }
    public function conObservaciones_estadia_carta_responsiva_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=carta_responsiva::find($id_c);
        return view('admin.conObservaciones_estadia_carta_responsiva',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estadia_carta_responsiva_admin(Request $request, $idU) {
        $id_c   = ['id_c'=>$request->input('id_c'), 'idU'=>$idU];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estadia_carta_responsiva',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estadia_carta_responsiva_admin(Request $request,$id, $idU){
        $observacion= $request->input('observaciones');
        $carta=carta_responsiva::find($id);
        $carta->estado_c_r=0;
        $carta->observaciones_c_r=$observacion;
        $carta->save();
        $resp='Carta responsiva con observacion y '.CorreoController::store($idU, "Carta resposiva",2);
        return redirect('estadia_Documentos')->with('observaciones',$resp);
    }

     //f01
     public function ver_cd_estadia_f01_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        $resp=file_exists($nombreD);
        if($resp==true){
            return response()->file($nombreD);
        }else
        {
            return redirect('estadia_Documentos')->with('sinRespuesta',' F-01 Carta Presentación no ha sido encontrado');
        }
    }

    public function aceptar_estadia_f01_admin($idU,$id,$name) {
        $carta=carta_presentacion::find($id);
        $carta->estado_c_p=2;
        $carta->save();
        $resp='Carta de presentacion Aceptada y '.CorreoController::store($idU, "Carta de presentacion",1);
         return redirect('estadia_Documentos')->with('aceptado',$resp);
    }
    
    public function pendiente_estadia_f01_admin($idU,$id,$name) {
        $carta=carta_presentacion::find($id);
        $carta->estado_c_p=1;
        $carta->save();
         return redirect('estadia_Documentos')->with('pendiente','F-01 Pendiente');
    }
    public function conObservaciones_estadia_f01_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=carta_presentacion::find($id_c);
        return view('admin.conObservaciones_estadia_f01',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estadia_f01_admin(Request $request, $idU) {
        $id_c   = ['id_c'=>$request->input('id_c'), 'idU'=>$idU];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estadia_f01',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estadia_f01_admin(Request $request,$id, $idU){
        $observacion= $request->input('observaciones');
        $carta=carta_presentacion::find($id);
        $carta->estado_c_p=0;
        $carta->observaciones_c_p=$observacion;
        $carta->save();
        $resp='Carta de presentación con observacion y '.CorreoController::store($idU, "Carta de presentación",2);
        return redirect('estadia_Documentos')->with('observaciones',$resp);
    }

    //f02
    public function ver_cd_estadia_f02_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        $resp=file_exists($nombreD);
        if($resp==true){
            return response()->file($nombreD);
        }else
        {
            return redirect('estadia_Documentos')->with('sinRespuesta',' F-02 Carta Aceptación no ha sido encontrado');
        }
    }

    public function aceptar_estadia_f02_admin($idU,$id,$name) {
        $carta=carta_aceptacion::find($id);
        $carta->estado=2;
        $carta->save();
        $resp='Carta de aceptación Aceptada y '.CorreoController::store($idU, "Carta de aceptación",1);
         return redirect('estadia_Documentos')->with('success',$resp);
    }
    
    public function pendiente_estadia_f02_admin($idU,$id,$name) {
        $carta=carta_aceptacion::find($id);
        $carta->estado=1;
        $carta->save();
         return redirect('estadia_Documentos')->with('pendiente','F-02 Pendiente');
    }
    public function conObservaciones_estadia_f02_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=carta_aceptacion::find($id_c);
        return view('admin.conObservaciones_estadia_f02',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estadia_f02_admin(Request $request, $idU) {
        $id_c   = ['id_c'=>$request->input('id_c'), 'idU'=>$idU];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estadia_f02',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estadia_f02_admin(Request $request,$id, $idU){
        $observacion= $request->input('observaciones');
        $carta=carta_aceptacion::find($id);
        $carta->estado=0;
        $carta->observaciones=$observacion;
        $carta->save();
        $resp='Carta de aceptación con observacion y '.CorreoController::store($idU, "Carta de aceptación",2);
        return redirect('estadia_Documentos')->with('observaciones',$resp);
    }
    //f03
    public function ver_cd_estadia_f03_admin($idU,$id,$name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        $resp=file_exists($nombreD);
        if($resp==true){
            return response()->file($nombreD);
        }else
        {
            return redirect('estadia_Documentos')->with('sinRespuesta',' F-03 Cédula Registro no ha sido encontrado');
        }

    }
    public function aceptar_estadia_f03_admin($idU,$id,$name) {
        $carta=cedula_registro::find($id);
        $carta->estado_c_r=2;
        $carta->save();
        $resp='Cedula de Resgistro Aceptada y '.CorreoController::store($idU, "Cedula de Registro",1);
         return redirect('estadia_Documentos')->with('success',$resp);
    }
    public function pendiente_estadia_f03_admin($idU,$id,$name) {
        $carta=cedula_registro::find($id);
        $carta->estado_c_r=1;
        $carta->save();
         return redirect('estadia_Documentos')->with('pendiente','F-03 Pendiente');
    }
    public function conObservaciones_estadia_f03_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=cedula_registro::find($id_c);
        return view('admin.conObservaciones',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estadia_f03_admin(Request $request, $idU) {
        $id_c   = ['id_c'=>$request->input('id_c'), 'idU'=>$idU];
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones',['datos'=>$datos,]);
    }

    public function  guardarObservaciones_estadia_f03_admin(Request $request,$id, $idU){
        $observacion= $request->input('observaciones');
        $carta=cedula_registro::find($id);
        $carta->estado_c_r=0;
        $carta->observaciones_c_r=$observacion;
        $carta->save();
        $resp='Cedula de registro con observacion y '.CorreoController::store($idU, "Cedula de registro",2);
        return redirect('estadia_Documentos')->with('observaciones',$resp);
    }
    
    //f04
    public function ver_cd_estadia_f04_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        $resp=file_exists($nombreD);
        if($resp==true){
            return response()->file($nombreD);
        }else
        {
            return redirect('estadia_Documentos')->with('sinRespuesta',' F-04 Definición de Proyecto, no ha sido encontrado');
        }
    }

    public function aceptar_estadia_f04_admin($idU,$id,$name) {
        $carta=definicion_proyecto::find($id);
        $carta->estado_d_p=2;
        $carta->save();
        $resp='Definición de proyecto Aceptada y '.CorreoController::store($idU, "Definición de proyecto",1);
         return redirect('estadia_Documentos')->with('success',$resp);
    }
    public function pendiente_estadia_f04_admin($idU,$id,$name) {
        $carta=definicion_proyecto::find($id);
        $carta->estado_d_p=1;
        $carta->save();
         return redirect('estadia_Documentos')->with('pendiente','F-04 Pendiente');
    }
    public function conObservaciones_estadia_f04_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=definicion_proyecto::find($id_c);
        return view('admin.conObservaciones_estadia_f04',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estadia_f04_admin(Request $request, $idU) {
        $id_c   = ['id_c'=>$request->input('id_c'), 'idU'=>$idU];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estadia_f04',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estadia_f04_admin(Request $request,$id, $idU){
        $observacion= $request->input('observaciones');
        $carta=definicion_proyecto::find($id);
        $carta->estado_d_p=0;
        $carta->observaciones_d_p=$observacion;
        $carta->save();
        $resp='Definicion de proyecto con observacion y '.CorreoController::store($idU, "Definición de proyecto",2);
        return redirect('estadia_Documentos')->with('observaciones',$resp);
    }

    //f05
    public function ver_cd_estadia_f05_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        $resp=file_exists($nombreD);
        if($resp==true){
            return response()->file($nombreD);
        }else
        {
            return redirect('estadia_Documentos')->with('sinRespuesta',' F-05 Carta de liberación no ha sido encontrado');
        }
    }

    public function aceptar_estadia_f05_admin($idU,$id,$name) {
        $carta=carta_liberacion::find($id);
        $carta->estado_c_l=2;
        $carta->save();
        $resp='Carta de Liberación Aceptada y '.CorreoController::store($idU, "Carta de liberación",1);
         return redirect('estadia_Documentos')->with('success',$resp);
    }
    public function pendiente_estadia_f05_admin($idU,$id,$name) {
        $carta=carta_liberacion::find($id);
        $carta->estado_c_l=1;
        $carta->save();
         return redirect('estadia_Documentos')->with('pendiente','F-05 Pendiente');
    }
    public function conObservaciones_estadia_f05_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=carta_liberacion::find($id_c);
        return view('admin.conObservaciones_estadia_f05',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estadia_f05_admin(Request $request, $idU) {
        $id_c   = ['id_c'=>$request->input('id_c'), 'idU'=>$idU];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estadia_f05',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estadia_f05_admin(Request $request,$id, $idU){
        $observacion= $request->input('observaciones');
        $carta=carta_liberacion::find($id);
        $carta->estado_c_l=0;
        $carta->observaciones_c_l=$observacion;
        $carta->save();
        $resp='Carta de liberación con observacion y '.CorreoController::store($idU, "Carta de liberación",2);
        return redirect('estadia_Documentos')->with('observaciones',$resp);
    }

    
    public function buscador(Request $request){        
        $texto   =trim($request->get('texto'));
        $estatus =trim($request->get('estatus'));
        $año     =trim($request->get('año'));

        $users0 = DB::table('users')
        ->where('users.name','LIKE','%'.$texto.'%')
        ->orWhere('users.email','LIKE','%'.$texto.'%')
        ->get();
        $nombres=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso',3)
        ->get();

        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->where('alumno.id_procesos','3')
        ->get();

        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->where('documentos.id_proceso','3')
        ->where('documentos.estatus','LIKE','%'.$estatus.'%')
        ->where('documentos.updated_at','LIKE','%'.$año.'%')
        ->get();

        $users1   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];
        $datos = Arr::collapse([$users1,$docs]);

        $doc_f02 = DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_aceptacion','documentos.id_c_aceptacion','=','carta_aceptacion.id')
        ->where('documentos.id_proceso','3')
        ->get();

        $doc_f04=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','documentos.id_d_proyecto','=','definicion_proyecto.id')
        ->where('documentos.id_proceso','3')
        ->get();

        $c_a   = ['carta_aceptacion' => $doc_f02];
        $d_p   = ['definicion_proyecto' => $doc_f04];
        $datos1 = Arr::collapse([$c_a,$d_p]);

        $doc_f03=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $doc_f05=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','documentos.id_c_liberacion','=','carta_liberacion.id')
        ->where('documentos.id_proceso','3')

        ->get();
        $c_l   = ['carta_liberacion' => $doc_f05];
        $c_r   = ['cedula_registro' => $doc_f03];
        $datos2 = Arr::collapse([$c_l,$c_r]);

        $doc_carta_presentacion=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_presentacion','documentos.id_c_presentacion','=','carta_presentacion.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $doc_carga_horaria=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carga_horaria','documentos.id_c_horaria','=','carga_horaria.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $c_p   = ['carta_presentacion' => $doc_carta_presentacion];
        $c_h   = ['carga_horaria' => $doc_carga_horaria];
        $datos3 = Arr::collapse([$c_p,$c_h]);

        $doc_constancia_derecho=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('constancia_derecho','documentos.id_c_derecho','=','constancia_derecho.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $doc_carta_responsiva=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_responsiva','documentos.id_c_responsiva','=','carta_responsiva.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $c_d   = ['constancia_derecho' => $doc_constancia_derecho];
        $c_res   = ['carta_responsiva' => $doc_carta_responsiva];
        $datos4 = Arr::collapse([$c_d,$c_res]);

        $alumnos = DB::table('alumno')
        ->where('id_procesos','1')
        ->get();
        
        return view('nombres.Buscar_estancia1',['nombres'=>$nombres,'texto'=>$texto,'estatus'=>$estatus,'año'=>$año,'documentos'=>$users0,'documentos1'=>$datos,'documentos2'=>$datos1,'documentos3'=>$datos2,'documentos4'=>$datos3,'documentos5'=>$datos4,'alumnos'=>$alumnos]);
    }
    public function buscador_c(Request $request){        
        $texto   =trim($request->get('texto'));

        $users0 = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera') 
        ->where('alumno.nombres','LIKE','%'.$texto.'%')
        ->orWhere('alumno.ape_paterno','LIKE','%'.$texto.'%')
        ->orWhere('alumno.ape_materno','LIKE','%'.$texto.'%')
        ->orWhere('alumno.matricula','LIKE','%'.$texto.'%')
        ->orWhere('alumno.email','LIKE','%'.$texto.'%')
        ->orWhere('carreras.nombre_carrera','LIKE','%'.$texto.'%')
        ->where('alumno.id_procesos','3')
        ->get();

        $nombres=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->get();

        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->where('alumno.id_procesos','3')
        ->get();

        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->where('documentos.id_proceso','3')
        ->get();

        $users1   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];
        $datos = Arr::collapse([$users1,$docs]);

        $doc_f02 = DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_aceptacion','documentos.id_c_aceptacion','=','carta_aceptacion.id')
        ->where('documentos.id_proceso','3')
        ->get();

        $doc_f04=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','documentos.id_d_proyecto','=','definicion_proyecto.id')
        ->where('documentos.id_proceso','3')
        ->get();

        

        $c_a   = ['carta_aceptacion' => $doc_f02];
        $d_p   = ['definicion_proyecto' => $doc_f04];
        $datos1 = Arr::collapse([$c_a,$d_p]);

        $doc_f03=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $doc_f05=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','documentos.id_c_liberacion','=','carta_liberacion.id')
        ->where('documentos.id_proceso','3')

        ->get();
        $c_l   = ['carta_liberacion' => $doc_f05];
        $c_r   = ['cedula_registro' => $doc_f03];
        $datos2 = Arr::collapse([$c_l,$c_r]);

        $doc_carta_presentacion=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_presentacion','documentos.id_c_presentacion','=','carta_presentacion.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $doc_carga_horaria=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carga_horaria','documentos.id_c_horaria','=','carga_horaria.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $c_p   = ['carta_presentacion' => $doc_carta_presentacion];
        $c_h   = ['carga_horaria' => $doc_carga_horaria];
        $datos3 = Arr::collapse([$c_p,$c_h]);

        $doc_constancia_derecho=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('constancia_derecho','documentos.id_c_derecho','=','constancia_derecho.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $doc_carta_responsiva=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_responsiva','documentos.id_c_responsiva','=','carta_responsiva.id')
        ->where('documentos.id_proceso','3')
        ->get();
        $c_d   = ['constancia_derecho' => $doc_constancia_derecho];
        $c_res   = ['carta_responsiva' => $doc_carta_responsiva];
        $datos4 = Arr::collapse([$c_d,$c_res]);
        return view('nombres.buscar_estadia_c',['nombres'=>$nombres,'texto'=>$texto,'documentos'=>$users0,'documentos1'=>$datos,'documentos2'=>$datos1,'documentos3'=>$datos2,'documentos4'=>$datos3,'documentos5'=>$datos4]);
    }
}
