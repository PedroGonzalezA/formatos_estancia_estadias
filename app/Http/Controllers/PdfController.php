<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Empresa;
use App\Models\Asesor_Aca;
use App\Models\Asesor_Emp;
use App\Models\Proyecto;
use App\Models\alumno_def;
use App\Models\asesor_empresarial_def;
use App\Models\proyecto_def;
use App\Models\detalle_def;

use App\Models\carta_aceptacion;
use App\Models\carta_liberacion;
use App\Models\cedula_registro;
use App\Models\definicion_proyecto;
use App\Models\documentos;
use App\Models\etapas_del_proyecto;
use App\Models\respuesta_doc;
use App\Models\universidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class PdfController extends Controller
{
  //Generar PDF CON DATOS

    //descargar f01 estancia
    public function descarga_cd_f01_estancia(){
      $userID=Auth::user()->id; 
      $vinculacion=DB::table('universidad')
      ->get();

      $alumno = DB::table('users')
      ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
      ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
      ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
      ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
      ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
      ->join('empresa', 'empresa.id', '=', 'formulario.id_empresa')

      ->where('users.id',$userID)
      ->get();
      $pdf = app('dompdf.wrapper');

      view()->share('usuario.f01',$alumno);
        //############ Permitir ver imagenes si falla ################################
        $contxt = stream_context_create([
          'ssl' => [
              'verify_peer' => FALSE,
              'verify_peer_name' => FALSE,
              'allow_self_signed' => TRUE,
          ]
      ]);

      $pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir'=>public_path(),'chroot'=>'firma/']);
      $pdf->getDomPDF()->setHttpContext($contxt);

      $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');
      $pdf -> loadView('usuario.f01_cd_estancia', ['usuario' => $alumno,'vinculacion' => $vinculacion,'fecha'=>$spanish,]);

      return $pdf->download('F-01_Carta_Presentacion_Estancia.pdf');
   }
    //descargar f01 estadia
    public function descarga_cd_f01_estadia(){
      $userID=Auth::user()->id; 
      $vinculacion=DB::table('universidad')
      ->get();

      $alumno = DB::table('users')
      ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
      ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
      ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
      ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
      ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
      ->join('empresa', 'empresa.id', '=', 'formulario.id_empresa')

      ->where('users.id',$userID)
      ->get();
      $pdf = app('dompdf.wrapper');

      view()->share('usuario.f01_cd_estadia',$alumno);
        //############ Permitir ver imagenes si falla ################################
        $contxt = stream_context_create([
          'ssl' => [
              'verify_peer' => FALSE,
              'verify_peer_name' => FALSE,
              'allow_self_signed' => TRUE,
          ]
      ]);

      $pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true,'tempDir'=>public_path(),'chroot'=>'firma/']);
      $pdf->getDomPDF()->setHttpContext($contxt);
      $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');


      $pdf -> loadView('usuario.f01_cd_estadia', ['usuario' => $alumno,'vinculacion' => $vinculacion,'fecha'=>$spanish,]);
      return $pdf->download('F-01_Carta_Presentacion_Estadia.pdf');
    }

    //descargar f02 estancia

   public function descarga_cd_f02_estancia(){
      $userID=Auth::user()->id; 
      $alumno = DB::table('users')
      ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
      ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
      ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
      ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
      ->join('asesor_academico', 'formulario.id_asesor_aca', '=', 'asesor_academico.id')
      ->join('proyecto', 'formulario.id_proyecto', '=', 'proyecto.id')
      ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
      ->where('users.id',$userID)
      ->get();
      $uni=DB::table('universidad')->get();
      view()->share('usuario.f02_cd_estancia',$alumno);
      $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');
      $pdf = PDF::loadView('usuario.f02_cd_estancia', ['usuario' => $alumno,'vinculacion'=>$uni,'fecha'=>$spanish]);

      return $pdf->download('F-02_Carta_Aceptacion_Estancia.pdf');
   }
    //descargar f02 estadia
    public function descarga_cd_f02_estadia(){
      $userID=Auth::user()->id; 
      $alumno = DB::table('users')
      ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
      ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
      ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
      ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
      ->join('asesor_academico', 'formulario.id_asesor_aca', '=', 'asesor_academico.id')
      ->join('proyecto', 'formulario.id_proyecto', '=', 'proyecto.id')
      ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
      ->where('users.id',$userID)
      ->get();
      $uni=DB::table('universidad')->get();
      view()->share('usuario.f02_cd_estadia',$alumno);
      $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');

      $pdf = PDF::loadView('usuario.f02_cd_estadia', ['usuario' => $alumno,'vinculacion'=>$uni,'fecha'=>$spanish]);

      return $pdf->download('F-02_Carta_Aceptacion_Estadia.pdf');
   }

    //descargar f03 estancia

    public function descarga_cd_estancia_f03($id_proces){
        $userID=Auth::user()->id;

        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('empresa', 'formulario.id_empresa', '=', 'empresa.id')
        ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
        ->join('asesor_academico', 'formulario.id_asesor_aca', '=', 'asesor_academico.id')
        ->join('proyecto', 'formulario.id_proyecto', '=', 'proyecto.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->join('procesos', 'alumno.id_procesos', '=', 'procesos.id_procesos')
        ->join('tipo', 'empresa.id_tipo', '=', 'tipo.id_tipo')
        ->join('cargo as CE', 'asesor_empresarial.id_cargo_ae', '=', 'CE.id_cargo')
        ->join('cargo as CA', 'asesor_academico.id_cargo_aa', '=', 'CA.id_cargo')
        ->select('CA.nombre_cargo','CE.nombre_cargo','tipo.nombre_tipo','procesos.nombre_proceso','carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto')
        ->where('users.id',$userID)
        ->where('alumno.id_procesos', $id_proces)
        ->get();

        view()->share('usuario.f03_cd',$users);

        $pdf = PDF::loadView('usuario.f03_cd', ['usuario' => $users]);

        return $pdf->download('F-03_Cedula_Registro_Estancia.pdf');
    }
    //descargar f03 estadia
    public function descarga_cd_estadia_f03($id_proces){
        $userID=Auth::user()->id; 

        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('empresa', 'formulario.id_empresa', '=', 'empresa.id')
        ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
        ->join('asesor_academico', 'formulario.id_asesor_aca', '=', 'asesor_academico.id')
        ->join('proyecto', 'formulario.id_proyecto', '=', 'proyecto.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->join('procesos', 'alumno.id_procesos', '=', 'procesos.id_procesos')
        ->join('tipo', 'empresa.id_tipo', '=', 'tipo.id_tipo')
        ->join('cargo as CE', 'asesor_empresarial.id_cargo_ae', '=', 'CE.id_cargo')
        ->join('cargo as CA', 'asesor_academico.id_cargo_aa', '=', 'CA.id_cargo')
        ->select('CA.nombre_cargo','CE.nombre_cargo','tipo.nombre_tipo','procesos.nombre_proceso','carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto')
        ->where('users.id',$userID)
        ->where('alumno.id_procesos', $id_proces)
        ->get();

        view()->share('usuario.f03_cd_estadia',$users);

        $pdf = PDF::loadView('usuario.f03_cd_estadia', ['usuario' => $users]);

        return $pdf->download('F-03_Cedula_Registro_Estadia.pdf');
    }
    //descargar f04 estancia
    public function descarga_cd_estancia_f04($id_proces){
      $userID=Auth::user()->id; 

      $users = DB::table('users')
      ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
      ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
      ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
      ->join('empresa', 'formulario.id_empresa', '=', 'empresa.id')
      ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
      ->join('asesor_academico', 'formulario.id_asesor_aca', '=', 'asesor_academico.id')
      ->join('proyecto', 'formulario.id_proyecto', '=', 'proyecto.id')
      ->join('carreras', 'carreras.id_carrera', '=', 'alumno.id_carrera')
      ->select('carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto',)
      ->where('users.id',$userID)
      ->where('alumno.id_procesos',$id_proces)

      ->get();
 
      $definicionP = DB::table('users')
      ->join('respuesta_def', 'users.id', '=', 'respuesta_def.id_usuario')
      ->join('formulario_def', 'respuesta_def.id_formulario', '=', 'formulario_def.id')
      ->join('alumno_def', 'formulario_def.id_alumno', '=', 'alumno_def.id')
      ->join('asesor_empresarial_def', 'formulario_def.id_asesor_emp', '=', 'asesor_empresarial_def.id')
      ->join('proyecto_def', 'formulario_def.id_proyecto', '=', 'proyecto_def.id')
      ->join('detalle_def','formulario_def.id_detalle','=','detalle_def.id')
      ->where('users.id',$userID)
      ->where('alumno_def.id_proceso',$id_proces)
      ->get();
      
      //etapas de proyecto
      $etapas=DB::table('users')
      ->join('respuesta_etapa','users.id','=','respuesta_etapa.id_usuario')
      ->join('etapas_del_proyecto','etapas_del_proyecto.id','=','respuesta_etapa.id_etapa_proyecto')
      ->where('users.id',$userID)
      ->get();

      view()->share('usuario.f04',$users);
      //fecha
      $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');
      $pdf = PDF::loadView('usuario.f04_cd_estancia', ['usuario' => $users,'datos' => $definicionP,'etapas' => $etapas,'fecha'=>$spanish]);
 
      return $pdf->download('F-04_Definicion_de_Proyecto_Estancia.pdf');
    } 
    //descargar f04 estadia
    public function descarga_cd_estadia_f04(){
      $userID=Auth::user()->id; 

      $users = DB::table('users')
      ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
      ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
      ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
      ->join('empresa', 'formulario.id_empresa', '=', 'empresa.id')
      ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
      ->join('asesor_academico', 'formulario.id_asesor_aca', '=', 'asesor_academico.id')
      ->join('proyecto', 'formulario.id_proyecto', '=', 'proyecto.id')
      ->join('carreras', 'carreras.id_carrera', '=', 'alumno.id_carrera')
      ->select('carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto',)
      ->where('users.id',$userID)

      ->get();
 
      $definicionP = DB::table('users')
      ->join('respuesta_def', 'users.id', '=', 'respuesta_def.id_usuario')
      ->join('formulario_def', 'respuesta_def.id_formulario', '=', 'formulario_def.id')
      ->join('alumno_def', 'formulario_def.id_alumno', '=', 'alumno_def.id')
      ->join('asesor_empresarial_def', 'formulario_def.id_asesor_emp', '=', 'asesor_empresarial_def.id')
      ->join('proyecto_def', 'formulario_def.id_proyecto', '=', 'proyecto_def.id')
      ->join('detalle_def','formulario_def.id_detalle','=','detalle_def.id')
      ->where('users.id',$userID)
      ->get();
      
      //etapas de proyecto
      $etapas=DB::table('users')
      ->join('respuesta_etapa','users.id','=','respuesta_etapa.id_usuario')
      ->join('etapas_del_proyecto','etapas_del_proyecto.id','=','respuesta_etapa.id_etapa_proyecto')
      ->where('users.id',$userID)
      ->get();

      view()->share('usuario.f04_cd_estadia',$users);
      //fecha
      $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');

      $pdf = PDF::loadView('usuario.f04_cd_estadia', ['usuario' => $users,'datos' => $definicionP,'etapas' => $etapas,'fecha'=>$spanish]);
 
      return $pdf->download('F-04_Definicion_de_Proyecto_Estadia.pdf');
    } 
    //descargar f05 estancia
    public function descarga_cd_estancia_f05(){
      $userID=Auth::user()->id; 

      $users = DB::table('users')
      ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
      ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
      ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
      ->join('empresa', 'formulario.id_empresa', '=', 'empresa.id')
      ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
      ->join('asesor_academico', 'formulario.id_asesor_aca', '=', 'asesor_academico.id')
      ->join('proyecto', 'formulario.id_proyecto', '=', 'proyecto.id')
      ->join('carreras', 'carreras.id_carrera', '=', 'alumno.id_carrera')
      ->select('carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto')
      ->where('users.id',$userID)

      ->get();
 
      $definicionP = DB::table('users')
      ->join('respuesta_def', 'users.id', '=', 'respuesta_def.id_usuario')
      ->join('formulario_def', 'respuesta_def.id_formulario', '=', 'formulario_def.id')
      ->join('alumno_def', 'formulario_def.id_alumno', '=', 'alumno_def.id')
      ->join('asesor_empresarial_def', 'formulario_def.id_asesor_emp', '=', 'asesor_empresarial_def.id')
      ->join('proyecto_def', 'formulario_def.id_proyecto', '=', 'proyecto_def.id')
      ->join('detalle_def','formulario_def.id_detalle','=','detalle_def.id')
      ->where('users.id',$userID)

      ->get();
      
      $uni=DB::table('universidad')->get();

      view()->share('usuario.f05_cd_estancia',$users);
      //fecha
      $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');
      $pdf = PDF::loadView('usuario.f05_cd_estancia', ['usuario' => $users,'datos' => $definicionP,'vinculacion'=>$uni,'fecha'=>$spanish]);
 
      return $pdf->download('F-05_Carta_de_liberacion_Estancia.pdf');
    }
    
    //descargar f05 estadia
    public function descarga_cd_estadia_f05(){
      $userID=Auth::user()->id; 

      $users = DB::table('users')
      ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
      ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
      ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
      ->join('empresa', 'formulario.id_empresa', '=', 'empresa.id')
      ->join('asesor_empresarial', 'formulario.id_asesor_emp', '=', 'asesor_empresarial.id')
      ->join('asesor_academico', 'formulario.id_asesor_aca', '=', 'asesor_academico.id')
      ->join('proyecto', 'formulario.id_proyecto', '=', 'proyecto.id')
      ->join('carreras', 'carreras.id_carrera', '=', 'alumno.id_carrera')
      ->select('carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto')
      ->where('users.id',$userID)

      ->get();
 
      $definicionP = DB::table('users')
      ->join('respuesta_def', 'users.id', '=', 'respuesta_def.id_usuario')
      ->join('formulario_def', 'respuesta_def.id_formulario', '=', 'formulario_def.id')
      ->join('alumno_def', 'formulario_def.id_alumno', '=', 'alumno_def.id')
      ->join('asesor_empresarial_def', 'formulario_def.id_asesor_emp', '=', 'asesor_empresarial_def.id')
      ->join('proyecto_def', 'formulario_def.id_proyecto', '=', 'proyecto_def.id')
      ->join('detalle_def','formulario_def.id_detalle','=','detalle_def.id')
      ->where('users.id',$userID)

      ->get();

      $uni=DB::table('universidad')->get();

      view()->share('usuario.f05_cd_estadia',$users);
      //fecha
      $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');
      $pdf = PDF::loadView('usuario.f05_cd_estadia', ['usuario' => $users,'datos' => $definicionP,'vinculacion'=>$uni,'fecha'=>$spanish]);
 
      return $pdf->download('F-05_Carta_de_liberacion_Estadia.pdf');
    } 

 //eliminar cedula de registro

      //eliminar f03 estancia
      public function eliminarF03Estancia($id_a,$id_e,$id_a_e,$id_a_a,$id_p){    

        Alumno::find($id_a)->delete();
        Empresa::find($id_e)->delete();
        Asesor_Emp::find($id_a_e)->delete();
        Asesor_Aca::find($id_a_a)->delete();
        Proyecto::find($id_p)->delete();
        return redirect('estancia1')->with('eliminarF03','F-03 Eliminado');
      }
      //eliminar f03 estancia
      public function eliminarF03Estancia2($id_a,$id_e,$id_a_e,$id_a_a,$id_p){    

        Alumno::find($id_a)->delete();
        Empresa::find($id_e)->delete();
        Asesor_Emp::find($id_a_e)->delete();
        Asesor_Aca::find($id_a_a)->delete();
        Proyecto::find($id_p)->delete();
        return redirect('estancia2')->with('eliminarF03','F-03 Eliminado');
      }
      //eliminar f03 estadia

      public function eliminarF03Estadia($id_a,$id_e,$id_a_e,$id_a_a,$id_p){    

        Alumno::find($id_a)->delete();
        Empresa::find($id_e)->delete();
        Asesor_Emp::find($id_a_e)->delete();
        Asesor_Aca::find($id_a_a)->delete();
        Proyecto::find($id_p)->delete();
        return redirect('estadia')->with('eliminarF03','F-03 Eliminado');
      }
      //eliminar f04 estancia
      public function eliminarF04(Request $req,$id_a,$id_a_e,$id_p,$id_d){    
        $userID=Auth::user()->id; 

        alumno_def::find($id_a)->delete();
        asesor_empresarial_def::find($id_a_e)->delete();
        proyecto_def::find($id_p)->delete();
        detalle_def::find($id_d)->delete();

        $id_etapa_1=$req->get('id_etapas_1');
        $id_etapa_2=$req->get('id_etapas_2');
        $id_etapa_3=$req->get('id_etapas_3');
        $id_etapa_4=$req->get('id_etapas_4');
        $id_etapa_5=$req->get('id_etapas_5');
        $id_etapa_6=$req->get('id_etapas_6');
        $id_etapa_7=$req->get('id_etapas_7');
        $id_etapa_8=$req->get('id_etapas_8');
        $id_etapa_9=$req->get('id_etapas_9');
        $id_etapa_10=$req->get('id_etapas_10');
        $id_etapa_11=$req->get('id_etapas_11');
        $id_etapa_12=$req->get('id_etapas_12');
        $id_etapa_13=$req->get('id_etapas_13');
        $id_etapa_14=$req->get('id_etapas_14');
        $id_etapa_15=$req->get('id_etapas_15');

        try {
          $etapas1 = etapas_del_proyecto::find($id_etapa_1)->delete();
          $etapas2 = etapas_del_proyecto::find($id_etapa_2)->delete();
          $etapas3 = etapas_del_proyecto::find($id_etapa_3)->delete();
          $etapas4 = etapas_del_proyecto::find($id_etapa_4)->delete();
          $etapas5 = etapas_del_proyecto::find($id_etapa_5)->delete();
          $etapas6 = etapas_del_proyecto::find($id_etapa_6)->delete();
          $etapas7 = etapas_del_proyecto::find($id_etapa_7)->delete();
          $etapas8 = etapas_del_proyecto::find($id_etapa_8)->delete();
          $etapas9 = etapas_del_proyecto::find($id_etapa_9)->delete();
          $etapas10 = etapas_del_proyecto::find($id_etapa_10)->delete();
          $etapas11 = etapas_del_proyecto::find($id_etapa_11)->delete();
          $etapas12 = etapas_del_proyecto::find($id_etapa_12)->delete();
          $etapas13 = etapas_del_proyecto::find($id_etapa_13)->delete();
          $etapas14 = etapas_del_proyecto::find($id_etapa_14)->delete();
          $etapas15 = etapas_del_proyecto::find($id_etapa_15)->delete();
        } catch (\Throwable $th) {
          //throw $th;
        }
        return redirect('estancia1')->with('eliminarF04','F-04 Eliminado');

      }
      //eliminar f04 estancia
      public function eliminarF042(Request $req,$id_a,$id_a_e,$id_p,$id_d){    
        $userID=Auth::user()->id; 

        alumno_def::find($id_a)->delete();
        asesor_empresarial_def::find($id_a_e)->delete();
        proyecto_def::find($id_p)->delete();
        detalle_def::find($id_d)->delete();

        $id_etapa_1=$req->get('id_etapas_1');
        $id_etapa_2=$req->get('id_etapas_2');
        $id_etapa_3=$req->get('id_etapas_3');
        $id_etapa_4=$req->get('id_etapas_4');
        $id_etapa_5=$req->get('id_etapas_5');
        $id_etapa_6=$req->get('id_etapas_6');
        $id_etapa_7=$req->get('id_etapas_7');
        $id_etapa_8=$req->get('id_etapas_8');
        $id_etapa_9=$req->get('id_etapas_9');
        $id_etapa_10=$req->get('id_etapas_10');
        $id_etapa_11=$req->get('id_etapas_11');
        $id_etapa_12=$req->get('id_etapas_12');
        $id_etapa_13=$req->get('id_etapas_13');
        $id_etapa_14=$req->get('id_etapas_14');
        $id_etapa_15=$req->get('id_etapas_15');

        try {
          $etapas1 = etapas_del_proyecto::find($id_etapa_1)->delete();
          $etapas2 = etapas_del_proyecto::find($id_etapa_2)->delete();
          $etapas3 = etapas_del_proyecto::find($id_etapa_3)->delete();
          $etapas4 = etapas_del_proyecto::find($id_etapa_4)->delete();
          $etapas5 = etapas_del_proyecto::find($id_etapa_5)->delete();
          $etapas6 = etapas_del_proyecto::find($id_etapa_6)->delete();
          $etapas7 = etapas_del_proyecto::find($id_etapa_7)->delete();
          $etapas8 = etapas_del_proyecto::find($id_etapa_8)->delete();
          $etapas9 = etapas_del_proyecto::find($id_etapa_9)->delete();
          $etapas10 = etapas_del_proyecto::find($id_etapa_10)->delete();
          $etapas11 = etapas_del_proyecto::find($id_etapa_11)->delete();
          $etapas12 = etapas_del_proyecto::find($id_etapa_12)->delete();
          $etapas13 = etapas_del_proyecto::find($id_etapa_13)->delete();
          $etapas14 = etapas_del_proyecto::find($id_etapa_14)->delete();
          $etapas15 = etapas_del_proyecto::find($id_etapa_15)->delete();
        } catch (\Throwable $th) {
          //throw $th;
        }
        return redirect('estancia2')->with('eliminarF04','F-04 Eliminado');

      }

       //eliminar f04 estadia
       public function eliminarF04Estadia(Request $req,$id_a,$id_a_e,$id_p,$id_d){    
        $userID=Auth::user()->id; 

        alumno_def::find($id_a)->delete();
        asesor_empresarial_def::find($id_a_e)->delete();
        proyecto_def::find($id_p)->delete();
        detalle_def::find($id_d)->delete();

        $id_etapa_1=$req->get('id_etapas_1');
        $id_etapa_2=$req->get('id_etapas_2');
        $id_etapa_3=$req->get('id_etapas_3');
        $id_etapa_4=$req->get('id_etapas_4');
        $id_etapa_5=$req->get('id_etapas_5');
        $id_etapa_6=$req->get('id_etapas_6');
        $id_etapa_7=$req->get('id_etapas_7');
        $id_etapa_8=$req->get('id_etapas_8');
        $id_etapa_9=$req->get('id_etapas_9');
        $id_etapa_10=$req->get('id_etapas_10');
        $id_etapa_11=$req->get('id_etapas_11');
        $id_etapa_12=$req->get('id_etapas_12');
        $id_etapa_13=$req->get('id_etapas_13');
        $id_etapa_14=$req->get('id_etapas_14');
        $id_etapa_15=$req->get('id_etapas_15');

        try {
          $etapas1 = etapas_del_proyecto::find($id_etapa_1)->delete();
          $etapas2 = etapas_del_proyecto::find($id_etapa_2)->delete();
          $etapas3 = etapas_del_proyecto::find($id_etapa_3)->delete();
          $etapas4 = etapas_del_proyecto::find($id_etapa_4)->delete();
          $etapas5 = etapas_del_proyecto::find($id_etapa_5)->delete();
          $etapas6 = etapas_del_proyecto::find($id_etapa_6)->delete();
          $etapas7 = etapas_del_proyecto::find($id_etapa_7)->delete();
          $etapas8 = etapas_del_proyecto::find($id_etapa_8)->delete();
          $etapas9 = etapas_del_proyecto::find($id_etapa_9)->delete();
          $etapas10 = etapas_del_proyecto::find($id_etapa_10)->delete();
          $etapas11 = etapas_del_proyecto::find($id_etapa_11)->delete();
          $etapas12 = etapas_del_proyecto::find($id_etapa_12)->delete();
          $etapas13 = etapas_del_proyecto::find($id_etapa_13)->delete();
          $etapas14 = etapas_del_proyecto::find($id_etapa_14)->delete();
          $etapas15 = etapas_del_proyecto::find($id_etapa_15)->delete();
        } catch (\Throwable $th) {
          //throw $th;
        }
        return redirect('estadia')->with('eliminarF04','F-04 Eliminado');

      }
  //cancelar documentos
    //cancelar documento carga horaria estancia2
    public function cancelar_carga_horaria_Estancia(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_horaria=NULL;
      $carta->save();
      $nombreA=$req->get('nombreCarga_horaria');
      $formularioA = DB::table('carga_horaria')  
      ->where('carga_horaria.nombre_c_h', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estancia1')->with('cancelar_carga_horaria','Carga horaria Cancelada');
      }else{
        return redirect('estancia1')->with('cancelar_carga_horaria','Carga horaria Cancelada');
      }
    }
    public function cancelar_carga_horaria_Estancia2(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_horaria=NULL;
      $carta->save();
      $nombreA=$req->get('nombreCarga_horaria');
      $formularioA = DB::table('carga_horaria')  
      ->where('carga_horaria.nombre_c_h', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estancia2')->with('cancelar_carga_horaria','Carga horaria Cancelada');
      }else{
        return redirect('estancia2')->with('cancelar_carga_horaria','Carga horaria Cancelada');
      }
    }
    //cancelar documento carga horaria estadia
    public function cancelar_carga_horaria_Estadia(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_horaria=NULL;
      $carta->save();
      $nombreA=$req->get('nombreCarga_horaria');
      $formularioA = DB::table('carga_horaria')  
      ->where('carga_horaria.nombre_c_h', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estadia')->with('cancelar_carga_horaria','Carga horaria Cancelada');
      }else{
        return redirect('estadia')->with('cancelar_carga_horaria','Carga horaria Cancelada');
      }
    }

    //cancelar documento constancia derecho estancia
    public function cancelar_constancia_derecho_Estancia(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_derecho=NULL;
      $carta->save();
      $nombreA=$req->get('nombreConstancia_derecho');
      $formularioA = DB::table('constancia_derecho')  
      ->where('constancia_derecho.nombre_c_d', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estancia1')->with('cancelar_constancia_derecho','Constancia derecho Cancelada');
      }else{
        return redirect('estancia1')->with('cancelar_constancia_derecho','Constancia derecho Cancelada');
      }
    }
    //cancelar documento constancia derecho estancia
    public function cancelar_constancia_derecho_Estancia2(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_derecho=NULL;
      $carta->save();
      $nombreA=$req->get('nombreConstancia_derecho');
      $formularioA = DB::table('constancia_derecho')  
      ->where('constancia_derecho.nombre_c_d', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estancia2')->with('cancelar_constancia_derecho','Constancia derecho Cancelada');
      }else{
        return redirect('estancia2')->with('cancelar_constancia_derecho','Constancia derecho Cancelada');
      }
    }
    //cancelar documento constancia derecho estadia
    public function cancelar_constancia_derecho_Estadia(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_derecho=NULL;
      $carta->save();
      $nombreA=$req->get('nombreConstancia_derecho');
      $formularioA = DB::table('constancia_derecho')  
      ->where('constancia_derecho.nombre_c_d', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estadia')->with('cancelar_constancia_derecho','Constancia derecho Cancelada');
      }else{
        return redirect('estadia')->with('cancelar_constancia_derecho','Constancia derecho Cancelada');
      }
    }

    //cancelar documento carta_responsiva estancia
    public function cancelar_carta_responsiva_Estancia(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_responsiva=NULL;
      $carta->save();
      $nombreA=$req->get('nombreCarta_responsiva');
      $formularioA = DB::table('carta_responsiva')  
      ->where('carta_responsiva.nombre_c_r', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estancia')->with('cancelar_carta_responsiva','Carta responsiva Cancelada');
      }else{
        return redirect('estancia')->with('cancelar_carta_responsiva','Carta responsiva Cancelada');
      }
    }
    //cancelar documento carta_responsiva estancia
    public function cancelar_carta_responsiva_Estancia2(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_responsiva=NULL;
      $carta->save();
      $nombreA=$req->get('nombreCarta_responsiva');
      $formularioA = DB::table('carta_responsiva')  
      ->where('carta_responsiva.nombre_c_r', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estancia2')->with('cancelar_carta_responsiva','Carta responsiva Cancelada');
      }else{
        return redirect('estancia2')->with('cancelar_carta_responsiva','Carta responsiva Cancelada');
      }
    }
    //cancelar documento carta_responsiva estadia
    public function cancelar_carta_responsiva_Estadia(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_responsiva=NULL;
      $carta->save();
      $nombreA=$req->get('nombreCarta_responsiva');
      $formularioA = DB::table('carta_responsiva')  
      ->where('carta_responsiva.nombre_c_r', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estadia')->with('cancelar_carta_responsiva','Carta responsiva Cancelada');
      }else{
        return redirect('estadia')->with('cancelar_carta_responsiva','Carta responsiva Cancelada');
      }
    }
    //cancelar documento f01 estancia
    public function cancelarF01_Estancia(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_presentacion=NULL;
      $carta->save();
      $nombreA=$req->get('nombreAf01');
      $formularioA = DB::table('carta_presentacion')  
      ->where('carta_presentacion.nombre_c_p', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estancia1')->with('cancelarf01','F-01 Cancelado');
      }else{
        return redirect('estancia1')->with('cancelarf01','F-01 Cancelado');
      }
    }
    //cancelar documento f01 estancia 2
    public function cancelarF01_Estancia2(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_presentacion=NULL;
      $carta->save();
      $nombreA=$req->get('nombreAf01');
      $formularioA = DB::table('carta_presentacion')  
      ->where('carta_presentacion.nombre_c_p', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estancia2')->with('cancelarf01','F-01 Cancelado');
      }else{
        return redirect('estancia2')->with('cancelarf01','F-01 Cancelado');
      }
    }
    //cancelar documento f01 estadia
    public function cancelarF01_Estadia(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_presentacion=NULL;
      $carta->save();
      $nombreA=$req->get('nombreAf01');
      $formularioA = DB::table('carta_presentacion')  
      ->where('carta_presentacion.nombre_c_p', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estadia')->with('cancelarf01','F-01 Cancelado');
      }else{
        return redirect('estadia')->with('cancelarf01','F-01 Cancelado');
      }
    }
    //cancelar documento f02
      public function cancelarF02_Estancia(Request $req,$id_d,$nombre){    
        $carta=documentos::find($id_d);
        $carta->id_c_aceptacion=NULL;
        $carta->save();
        $nombreA=$req->get('nombreAf02');
        $formularioA = DB::table('carta_aceptacion')  
        ->where('carta_aceptacion.nombre', $nombreA)
        ->delete();
        $path=public_path().'/documentos/'.$nombreA;
        if(File::exists($path)){
          File::delete($path);
          return redirect('estancia1')->with('cancelarf02','F-02 Cancelado');
        }else{
          return redirect('estancia1')->with('cancelarf02','F-02 Cancelado');
        }
      }
    //cancelar documento f02
    public function cancelarF02_Estancia2(Request $req,$id_d,$nombre){    
      $carta=documentos::find($id_d);
      $carta->id_c_aceptacion=NULL;
      $carta->save();
      $nombreA=$req->get('nombreAf02');
      $formularioA = DB::table('carta_aceptacion')  
      ->where('carta_aceptacion.nombre', $nombreA)
      ->delete();
      $path=public_path().'/documentos/'.$nombreA;
      if(File::exists($path)){
        File::delete($path);
        return redirect('estancia2')->with('cancelarf02','F-02 Cancelado');
      }else{
        return redirect('estancia2')->with('cancelarf02','F-02 Cancelado');
      }
    }
      //cancelar documento f02 estadia
      public function cancelarF02_Estadia(Request $req,$id_d,$nombre){    
        $carta=documentos::find($id_d);
        $carta->id_c_aceptacion=NULL;
        $carta->save();
        $nombreA=$req->get('nombreAf02');
        $formularioA = DB::table('carta_aceptacion')  
        ->where('carta_aceptacion.nombre', $nombreA)
        ->delete();
        $path=public_path().'/documentos/'.$nombreA;
        if(File::exists($path)){
          File::delete($path);
          return redirect('estadia')->with('cancelarf02','F-02 Cancelado');
        }else{
          return redirect('estadia')->with('cancelarf02','F-02 Cancelado');
        }
      }
      //cancelar documento f03
      public function cancelarF03_Estancia(Request $req,$id_d,$nombre){    
        $carta=documentos::find($id_d);
        $carta->id_c_registro=NULL;
        $carta->save();
        $nombreA=$req->get('nombreAf03');
        $formularioA = DB::table('cedula_registro')  
        ->where('cedula_registro.nombre_c_r', $nombreA)
        ->delete();
        $path=public_path().'/documentos/'.$nombreA;
        if(File::exists($path)){
           File::delete($path);
           return redirect('estancia1')->with('cancelarf03','F-03 Cancelado');
        }else{
          return redirect('estancia1')->with('cancelarf03','F-03 Cancelado');
        }
      }
      //cancelar documento f03
      public function cancelarF03_Estancia2(Request $req,$id_d,$nombre){    
        $carta=documentos::find($id_d);
        $carta->id_c_registro=NULL;
        $carta->save();
        $nombreA=$req->get('nombreAf03');
        $formularioA = DB::table('cedula_registro')  
        ->where('cedula_registro.nombre_c_r', $nombreA)
        ->delete();
        $path=public_path().'/documentos/'.$nombreA;
        if(File::exists($path)){
           File::delete($path);
           return redirect('estancia2')->with('cancelarf03','F-03 Cancelado');
        }else{
          return redirect('estancia2')->with('cancelarf03','F-03 Cancelado');
        }
      }
      public function cancelarF03_Estadia(Request $req,$id_d,$nombre){    
        $carta=documentos::find($id_d);
        $carta->id_c_registro=NULL;
        $carta->save();
        $nombreA=$req->get('nombreAf03');
        $formularioA = DB::table('cedula_registro')  
        ->where('cedula_registro.nombre_c_r', $nombreA)
        ->delete();
        $path=public_path().'/documentos/'.$nombreA;
        if(File::exists($path)){
           File::delete($path);
           return redirect('estadia')->with('cancelarf03','F-03 Cancelado');
        }else{
          return redirect('estadia')->with('cancelarf03','F-03 Cancelado');
        }
      }

        //cancelar documento f04
        public function cancelarF04_Estancia(Request $req,$id_d,$nombre){    
          $carta=documentos::find($id_d);
          $carta->id_d_proyecto=NULL;
          $carta->save();
          $nombreA=$req->get('nombreAf04');
          $formularioA = DB::table('definicion_proyecto')  
          ->where('definicion_proyecto.nombre_d_p', $nombreA)
          ->delete();
          $path=public_path().'/documentos/'.$nombreA;
          if(File::exists($path)){
             File::delete($path);
             return redirect('estancia1')->with('cancelarf04','F-04 Cancelado');
          }else{
            return redirect('estancia1')->with('cancelarf04','F-04 Cancelado');
          }
        }
        //cancelar documento f04 2
        public function cancelarF04_Estancia2(Request $req,$id_d,$nombre){    
          $carta=documentos::find($id_d);
          $carta->id_d_proyecto=NULL;
          $carta->save();
          $nombreA=$req->get('nombreAf04');
          $formularioA = DB::table('definicion_proyecto')  
          ->where('definicion_proyecto.nombre_d_p', $nombreA)
          ->delete();
          $path=public_path().'/documentos/'.$nombreA;
          if(File::exists($path)){
             File::delete($path);
             return redirect('estancia2')->with('cancelarf04','F-04 Cancelado');
          }else{
            return redirect('estancia2')->with('cancelarf04','F-04 Cancelado');
          }
        }
        //cancelar documento f04 estadia
        public function cancelarF04_Estadia(Request $req,$id_d,$nombre){    
          $carta=documentos::find($id_d);
          $carta->id_d_proyecto=NULL;
          $carta->save();
          $nombreA=$req->get('nombreAf04');
          $formularioA = DB::table('definicion_proyecto')  
          ->where('definicion_proyecto.nombre_d_p', $nombreA)
          ->delete();
          $path=public_path().'/documentos/'.$nombreA;
          if(File::exists($path)){
             File::delete($path);
             return redirect('estadia')->with('cancelarf04','F-04 Cancelado');
          }else{
            return redirect('estadia')->with('cancelarf04','F-04 Cancelado');
          }
        }

        //cancelar documento f05
        public function cancelarF05_Estancia(Request $req,$id_d,$nombre){    
          $carta=documentos::find($id_d);
          $carta->id_c_liberacion=NULL;
          $carta->save();
          $nombreA=$req->get('nombreAf05');
          $formularioA = DB::table('carta_liberacion')  
          ->where('carta_liberacion.nombre_c_l', $nombreA)
          ->delete();
          $path=public_path().'/documentos/'.$nombreA;
          if(File::exists($path)){
             File::delete($path);
             return redirect('estancia1')->with('cancelarf05','F-05 Eliminado');
          }else{
            return redirect('estancia1')->with('cancelarf05','F-05 Eliminado');
          }
        }
        //cancelar documento f05 2
        public function cancelarF05_Estancia2(Request $req,$id_d,$nombre){    
          $carta=documentos::find($id_d);
          $carta->id_c_liberacion=NULL;
          $carta->save();
          $nombreA=$req->get('nombreAf05');
          $formularioA = DB::table('carta_liberacion')  
          ->where('carta_liberacion.nombre_c_l', $nombreA)
          ->delete();
          $path=public_path().'/documentos/'.$nombreA;
          if(File::exists($path)){
             File::delete($path);
             return redirect('estancia2')->with('cancelarf05','F-05 Eliminado');
          }else{
            return redirect('estancia2')->with('cancelarf05','F-05 Eliminado');
          }
        }
         //cancelar documento f05 estadia
         public function cancelarF05_Estadia(Request $req,$id_d,$nombre){    
          $carta=documentos::find($id_d);
          $carta->id_c_liberacion=NULL;
          $carta->save();
          $nombreA=$req->get('nombreAf05');
          $formularioA = DB::table('carta_liberacion')  
          ->where('carta_liberacion.nombre_c_l', $nombreA)
          ->delete();
          $path=public_path().'/documentos/'.$nombreA;
          if(File::exists($path)){
             File::delete($path);
             return redirect('estadia')->with('cancelarf05','F-05 Eliminado');
          }else{
            return redirect('estadia')->with('cancelarf05','F-05 Eliminado');
          }
        }
  
}
