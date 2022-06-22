<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
class definicionController extends Controller
{
    //estancia1
    public function ver(){
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
        
        
        $datosDefinicionProyecto = DB::table('users')
        ->join('respuesta_etapa', 'users.id', '=', 'respuesta_etapa.id_usuario')
        ->join('etapas_del_proyecto', 'respuesta_etapa.id_etapa_proyecto', '=', 'etapas_del_proyecto.id')
        ->where('users.id',$userID)
        ->get();

        $u  = ['cedula' => $users];
        $datosD  = ['datosDef' => $datosDefinicionProyecto];
        $datos = Arr::collapse([$u,$datosD]);
        //FECHA
        $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');
        return view('usuario.f04Formulario_estancia',['datos'=>$datos,'fecha'=>$spanish]);

   }
    //estancia1
    public function ver2(){
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
        
        
        $datosDefinicionProyecto = DB::table('users')
        ->join('respuesta_etapa', 'users.id', '=', 'respuesta_etapa.id_usuario')
        ->join('etapas_del_proyecto', 'respuesta_etapa.id_etapa_proyecto', '=', 'etapas_del_proyecto.id')
        ->where('users.id',$userID)
        ->get();

        $u  = ['cedula' => $users];
        $datosD  = ['datosDef' => $datosDefinicionProyecto];
        $datos = Arr::collapse([$u,$datosD]);
        //FECHA
        $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');
        return view('usuario.f04Formulario_estancia2',['datos'=>$datos,'fecha'=>$spanish]);

   }
   //estadia
   public function ver_estadia(){
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
    
    
    $datosDefinicionProyecto = DB::table('users')
    ->join('respuesta_etapa', 'users.id', '=', 'respuesta_etapa.id_usuario')
    ->join('etapas_del_proyecto', 'respuesta_etapa.id_etapa_proyecto', '=', 'etapas_del_proyecto.id')
    ->where('users.id',$userID)
    ->get();

    $u  = ['cedula' => $users];
    $datosD  = ['datosDef' => $datosDefinicionProyecto];
    $datos = Arr::collapse([$u,$datosD]);
    //FECHA
    $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es','es_MX.utf8');

    return view('usuario.f04Formulario_estadia',['datos'=>$datos,'fecha'=>$spanish]);

}
}
