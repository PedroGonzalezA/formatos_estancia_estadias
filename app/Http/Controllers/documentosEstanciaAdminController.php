<?php

namespace App\Http\Controllers;

use App\Models\carta_aceptacion;
use App\Models\carta_liberacion;
use App\Models\cedula_registro;
use App\Models\definicion_proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Barryvdh\DomPDF\Facade as PDF;

class documentosEstanciaAdminController extends Controller
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
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();

        $users   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];
        $datos = Arr::collapse([$users,$docs]);

        $doc_f02 = DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_aceptacion','documentos.id_c_aceptacion','=','carta_aceptacion.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();

        $doc_f04=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','documentos.id_d_proyecto','=','definicion_proyecto.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();

        $c_a   = ['carta_aceptacion' => $doc_f02];
        $d_p   = ['definicion_proyecto' => $doc_f04];
        $datos1 = Arr::collapse([$c_a,$d_p]);

        $doc_f03=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();
        $doc_f05=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','documentos.id_c_liberacion','=','carta_liberacion.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();
        $c_l   = ['carta_liberacion' => $doc_f05];
        $c_r   = ['cedula_registro' => $doc_f03];
        $datos2 = Arr::collapse([$c_l,$c_r]);
        return view('admin.documentosEstancia',['documentos'=>$datos,'documentos1'=>$datos1,'documentos2'=>$datos2]);
    }

    public function ver_cd_estancia_f03($id,$name){
        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('empresa', 'formulario.id_empresa', '=', 'empresa.id')
        ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
        ->join('asesor_academico', 'formulario.id_asesor_aca', '=', 'asesor_academico.id')
        ->join('proyecto', 'formulario.id_proyecto', '=', 'proyecto.id')
        ->join('carreras', 'carreras.id_carrera', '=', 'alumno.id_carrera')
        ->select('formulario.id_alumno','formulario.id_empresa','formulario.id_asesor_emp','formulario.id_asesor_aca','formulario.id_proyecto','formulario.id','respuesta.id_usuario','carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto')
        ->where('users.name',$name)
        ->get();

        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('cedula_registro.id',$id)
        ->get();

        $users   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];

        
        $datos = Arr::collapse([$users,$docs]);
        return  view('admin.f03_cd_estancia',['documentos'=>$datos,]);
    }

    //f02
    public function ver_cd_estancia_f02_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        return response()->file($nombreD);
    }

    public function aceptar_estancia_f02_admin($idU,$id,$name) {
        $carta=carta_aceptacion::find($id);
        $carta->estado=2;
        $carta->save();
         return redirect('estancia_Documentos')->with('success','F-02 Aceptado');
    }
    public function pendiente_estancia_f02_admin($idU,$id,$name) {
        $carta=carta_aceptacion::find($id);
        $carta->estado=1;
        $carta->save();
         return redirect('estancia_Documentos')->with('success','F-02 Pendiente');
    }
    public function conObservaciones_estancia_f02_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=carta_aceptacion::find($id_c);
        return view('admin.conObservaciones_estancia_f02',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estancia_f02_admin(Request $request) {
        $id_c   = ['id_c'=>$request->input('id_c')];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estancia_f02',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estancia_f02_admin(Request $request,$id){
        $observacion= $request->input('observaciones');
        $carta=carta_aceptacion::find($id);
        $carta->estado=0;
        $carta->observaciones=$observacion;
        $carta->save();
        return redirect('estancia_Documentos')->with('success','F-02 Con Observacion');
    }
    //f03
    public function ver_cd_estancia_f03_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        return response()->file($nombreD);
    }

    public function aceptar_estancia_f03_admin($idU,$id,$name) {
        $carta=cedula_registro::find($id);
        $carta->estado_c_r=2;
        $carta->save();
         return redirect('estancia_Documentos')->with('success','F-03 Aceptado');
    }
    public function pendiente_estancia_f03_admin($idU,$id,$name) {
        $carta=cedula_registro::find($id);
        $carta->estado_c_r=1;
        $carta->save();
         return redirect('estancia_Documentos')->with('success','F-03 Pendiente');
    }
    public function conObservaciones_estancia_f03_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=cedula_registro::find($id_c);
        return view('admin.conObservaciones_estancia',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estancia_f03_admin(Request $request) {
        $id_c   = ['id_c'=>$request->input('id_c')];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estancia',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estancia_f03_admin(Request $request,$id){
        $observacion= $request->input('observaciones');
        $carta=cedula_registro::find($id);
        $carta->estado_c_r=0;
        $carta->observaciones_c_r=$observacion;
        $carta->save();
        return redirect('estancia_Documentos')->with('success','F-03 Con Observacion');
    }
    //f04
    public function ver_cd_estancia_f04_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        return response()->file($nombreD);
    }

    public function aceptar_estancia_f04_admin($idU,$id,$name) {
        $carta=definicion_proyecto::find($id);
        $carta->estado_d_p=2;
        $carta->save();
         return redirect('estancia_Documentos')->with('success','F-04 Aceptado');
    }
    public function pendiente_estancia_f04_admin($idU,$id,$name) {
        $carta=definicion_proyecto::find($id);
        $carta->estado_d_p=1;
        $carta->save();
         return redirect('estancia_Documentos')->with('success','F-04 Pendiente');
    }
    public function conObservaciones_estancia_f04_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=definicion_proyecto::find($id_c);
        return view('admin.conObservaciones_estancia_f04',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estancia_f04_admin(Request $request) {
        $id_c   = ['id_c'=>$request->input('id_c')];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estancia_f04',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estancia_f04_admin(Request $request,$id){
        $observacion= $request->input('observaciones');
        $carta=definicion_proyecto::find($id);
        $carta->estado_d_p=0;
        $carta->observaciones_d_p=$observacion;
        $carta->save();
        return redirect('estancia_Documentos')->with('success','F-04 Con Observacion');
    }

    //f05
    public function ver_cd_estancia_f05_admin($name) {
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        return response()->file($nombreD);
    }

    public function aceptar_estancia_f05_admin($idU,$id,$name) {
        $carta=carta_liberacion::find($id);
        $carta->estado_c_l=2;
        $carta->save();
         return redirect('estancia_Documentos')->with('success','F-05 Aceptado');
    }
    public function pendiente_estancia_f05_admin($idU,$id,$name) {
        $carta=carta_liberacion::find($id);
        $carta->estado_c_l=1;
        $carta->save();
         return redirect('estancia_Documentos')->with('success','F-05 Pendiente');
    }
    public function conObservaciones_estancia_f05_admin(Request $request) {
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c')];
        $datos = Arr::collapse([$id_c_r]);
        $cedula=carta_liberacion::find($id_c);
        return view('admin.conObservaciones_estancia_f05',['datos'=>$cedula,'id'=>$datos]);
    }
    public function observaciones_estancia_f05_admin(Request $request) {
        $id_c   = ['id_c'=>$request->input('id_c')];
        
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estancia_f05',['datos'=>$datos]);
    }

    public function  guardarObservaciones_estancia_f05_admin(Request $request,$id){
        $observacion= $request->input('observaciones');
        $carta=carta_liberacion::find($id);
        $carta->estado_c_l=0;
        $carta->observaciones_c_l=$observacion;
        $carta->save();
        return redirect('estancia_Documentos')->with('success','F-05 Con Observacion');
    }

    //buscar
    public function buscador_estancia(Request $request){        
        $texto   =trim($request->get('texto'));

        $users0 = DB::table('users')
        ->where('users.name','LIKE','%'.$texto.'%')
        ->orWhere('users.email','LIKE','%'.$texto.'%')
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
        ->get();

        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();

        $users1   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];
        $datos = Arr::collapse([$users1,$docs]);

        $doc_f02 = DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_aceptacion','documentos.id_c_aceptacion','=','carta_aceptacion.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();

        $doc_f04=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','documentos.id_d_proyecto','=','definicion_proyecto.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();

        $c_a   = ['carta_aceptacion' => $doc_f02];
        $d_p   = ['definicion_proyecto' => $doc_f04];
        $datos1 = Arr::collapse([$c_a,$d_p]);

        $doc_f03=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();
        $doc_f05=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','documentos.id_c_liberacion','=','carta_liberacion.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();
        $c_l   = ['carta_liberacion' => $doc_f05];
        $c_r   = ['cedula_registro' => $doc_f03];
        $datos2 = Arr::collapse([$c_l,$c_r]);
        return view('nombres.buscar_estancia',['nombres'=>$nombres,'texto'=>$texto,'documentos'=>$users0,'documentos1'=>$datos,'documentos2'=>$datos1,'documentos3'=>$datos2]);
    }

    //buscar
    public function buscador_estancia_c(Request $request){        
        $texto   =trim($request->get('texto'));

        $users0 = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->where('alumno.id_procesos','1')
        ->where('alumno.id_procesos','2')  
        ->orWhere('alumno.nombres','LIKE','%'.$texto.'%')
        ->orWhere('alumno.ape_paterno','LIKE','%'.$texto.'%')
        ->orWhere('alumno.ape_materno','LIKE','%'.$texto.'%')
        ->orWhere('alumno.matricula','LIKE','%'.$texto.'%')
        ->orWhere('alumno.email','LIKE','%'.$texto.'%')
        ->orWhere('carreras.nombre_carrera','LIKE','%'.$texto.'%')
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
        ->get();

        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();

        $users1   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];
        $datos = Arr::collapse([$users1,$docs]);

        $doc_f02 = DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_aceptacion','documentos.id_c_aceptacion','=','carta_aceptacion.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();

        $doc_f04=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','documentos.id_d_proyecto','=','definicion_proyecto.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();

        $c_a   = ['carta_aceptacion' => $doc_f02];
        $d_p   = ['definicion_proyecto' => $doc_f04];
        $datos1 = Arr::collapse([$c_a,$d_p]);

        $doc_f03=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();
        $doc_f05=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','documentos.id_c_liberacion','=','carta_liberacion.id')
        ->where('documentos.id_proceso','1')
        ->orWhere('documentos.id_proceso','2')
        ->get();
        $c_l   = ['carta_liberacion' => $doc_f05];
        $c_r   = ['cedula_registro' => $doc_f03];
        $datos2 = Arr::collapse([$c_l,$c_r]);
        return view('nombres.buscar_estancia_c',['nombres'=>$nombres,'texto'=>$texto,'documentos'=>$users0,'documentos1'=>$datos,'documentos2'=>$datos1,'documentos3'=>$datos2]);
    }
}
