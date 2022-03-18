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
      $pdf -> loadView('usuario.f01_cd_estancia', ['usuario' => $alumno,'vinculacion' => $vinculacion,]);

      return $pdf->download('F-01_Carta_Presentacion_Estancia.pdf');
   }
    //descargar f01 estadia


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
      view()->share('usuario.f02_cd_estancia',$alumno);

      $pdf = PDF::loadView('usuario.f02_cd_estancia', ['usuario' => $alumno]);

      return $pdf->download('F-02_Carta_Aceptacion_Estancia.pdf');
   }
    //descargar f02 estadia


    //descargar f03 estancia

    public function descarga_cd_estancia_f03(){
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

        ->get();

        view()->share('usuario.f03_cd',$users);

        $pdf = PDF::loadView('usuario.f03_cd', ['usuario' => $users]);

        return $pdf->download('F-03_Cedula_Registro_Estancia.pdf');
    }
    //descargar f03 estadia
    public function descarga_cd_estadia_f03(){
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
        ->get();

        view()->share('usuario.f03_cd_estadia',$users);

        $pdf = PDF::loadView('usuario.f03_cd_estadia', ['usuario' => $users]);

        return $pdf->download('F-03_Cedula_Registro_Estadia.pdf');
    }
//descargar f04 estancia
    public function descarga_cd_estancia_f04(){
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
      ->select('carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto','proyecto.objetivos_proyecto')
      ->where('users.id',$userID)

      ->get();
 
      $definicionP = DB::table('users')
      ->join('respuesta_def', 'users.id', '=', 'respuesta_def.id_usuario_d_p')
      ->join('formulario_def', 'respuesta_def.id_formulario_d_p', '=', 'formulario_def.id')
      ->join('alumno_def', 'formulario_def.id_alumno', '=', 'alumno_def.id')
      ->join('asesor_empresarial_def', 'formulario_def.id_asesor_emp', '=', 'asesor_empresarial_def.id')
      ->join('proyecto_def', 'formulario_def.id_proyecto', '=', 'proyecto_def.id')
      ->join('detalle_def','formulario_def.id_detalle','=','detalle_def.id')
      ->where('users.id',$userID)
      ->get();
 
      view()->share('usuario.f04',$users);
 
      $pdf = PDF::loadView('usuario.f04_cd_estancia', ['usuario' => $users,'datos' => $definicionP]);
 
      return $pdf->download('F-04_Definicion_de_Proyecto_Estancia.pdf');
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
      ->select('carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto','proyecto.objetivos_proyecto')
      ->where('users.id',$userID)

      ->get();
 
      $definicionP = DB::table('users')
      ->join('respuesta_def', 'users.id', '=', 'respuesta_def.id_usuario_d_p')
      ->join('formulario_def', 'respuesta_def.id_formulario_d_p', '=', 'formulario_def.id')
      ->join('alumno_def', 'formulario_def.id_alumno', '=', 'alumno_def.id')
      ->join('asesor_empresarial_def', 'formulario_def.id_asesor_emp', '=', 'asesor_empresarial_def.id')
      ->join('proyecto_def', 'formulario_def.id_proyecto', '=', 'proyecto_def.id')
      ->join('detalle_def','formulario_def.id_detalle','=','detalle_def.id')
      ->where('users.id',$userID)

      ->get();
 
      view()->share('usuario.f05_cd_estancia',$users);
 
      $pdf = PDF::loadView('usuario.f05_cd_estancia', ['usuario' => $users,'datos' => $definicionP]);
 
      return $pdf->download('F-05_Carta_de_liberacion_Estancia.pdf');
    } 

 //eliminar cedula de registro

      //eliminar f03 estancia
      public function eliminarF03Estancia($id_a,$id_e,$id_a_e,$id_a_a,$id_p){    

        Alumno::find($id_a)->delete();
        Empresa::find($id_e)->delete();
        Asesor_Emp::find($id_a_e)->delete();
        Asesor_Aca::find($id_a_a)->delete();
        Proyecto::find($id_p)->delete();
        return redirect('estancia');
      }
      //eliminar f03 estadia

      public function eliminarF03Estadia($id_a,$id_e,$id_a_e,$id_a_a,$id_p){    

        Alumno::find($id_a)->delete();
        Empresa::find($id_e)->delete();
        Asesor_Emp::find($id_a_e)->delete();
        Asesor_Aca::find($id_a_a)->delete();
        Proyecto::find($id_p)->delete();
        return redirect('estadia');
      }
      //eliminar f04 estancia
      public function eliminarF04($id_a,$id_a_e,$id_p,$id_d){    

        alumno_def::find($id_a)->delete();
        asesor_empresarial_def::find($id_a_e)->delete();
        proyecto_def::find($id_p)->delete();
        detalle_def::find($id_d)->delete();
        return redirect('estancia');
     
      }
  //cancelar documentos

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
           return redirect('estancia');
        }else{
          return redirect('estancia');
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
           return redirect('estadia');
        }else{
          return redirect('estadia');
        }
      }
}
