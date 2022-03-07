<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Empresa;
use App\Models\Asesor_Aca;
use App\Models\Asesor_Emp;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Redirect;
class PdfController extends Controller
{
    //
    public function descarga_cd_f03(){

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
        ->get();

        view()->share('usuario.f03_cd',$users);

        $pdf = PDF::loadView('usuario.f03_cd', ['usuario' => $users]);

        return $pdf->download('F-03_Cedula_Registro_Estancia.pdf');
    }
    public function descarga_cd_estadia_f03(){

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
        ->get();

        view()->share('usuario.f03_cd_estadia',$users);

        $pdf = PDF::loadView('usuario.f03_cd_estadia', ['usuario' => $users]);

        return $pdf->download('F-03_Cedula_Registro_Estadia.pdf');
    }

    
      public function eliminarF03Estadia($id_a,$id_e,$id_a_e,$id_a_a,$id_p){    

        Alumno::find($id_a)->delete();
        Empresa::find($id_e)->delete();
        Asesor_Emp::find($id_a_e)->delete();
        Asesor_Aca::find($id_a_a)->delete();
        Proyecto::find($id_p)->delete();
        return redirect('estadia');
      }
      public function eliminarF03Estancia($id_a,$id_e,$id_a_e,$id_a_a,$id_p){    

        Alumno::find($id_a)->delete();
        Empresa::find($id_e)->delete();
        Asesor_Emp::find($id_a_e)->delete();
        Asesor_Aca::find($id_a_a)->delete();
        Proyecto::find($id_p)->delete();
        return redirect('estancia');
      }

}
