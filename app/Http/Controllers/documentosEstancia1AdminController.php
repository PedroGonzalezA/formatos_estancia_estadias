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
use Illuminate\Support\Facades\Auth;

class documentosEstancia1AdminController extends Controller
{
    public function ver($proces){
        $name=['Estancia I','Estancia II','Estadia','Estadias Nacionales','Servicio Social'];
        //!cambiar este numero si se quiere agregar un nuevo proceso y tambien agregar el nombre en $name
        if($proces>0 && $proces<=5){//comprueba si el numero es de algun proceso del 1...5
            //$NmProces=$name[$proces-1];
            $var=[$proces,$name[$proces-1]];//guarda el numero y nombre del proceso
        }else return redirect('admin');
        
        //datos usuarios
        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->where('alumno.id_procesos',$proces)
        ->get();
        //datos de documentos
        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->where('documentos.id_proceso',$proces)
        ->get();
        //array 1
        $users   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];
        $datos = Arr::collapse([$users,$docs]);

        //datos f02
        $doc_f02 = DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_aceptacion','documentos.id_c_aceptacion','=','carta_aceptacion.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        //datos f04
        $doc_f04=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','documentos.id_d_proyecto','=','definicion_proyecto.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        //array 2
        $c_a   = ['carta_aceptacion' => $doc_f02];
        $d_p   = ['definicion_proyecto' => $doc_f04];
        $datos1 = Arr::collapse([$c_a,$d_p]);
        //datos f03
        $doc_f03=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        //datos f05
        $doc_f05=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','documentos.id_c_liberacion','=','carta_liberacion.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        //array 3
        $c_l   = ['carta_liberacion' => $doc_f05];
        $c_r   = ['cedula_registro' => $doc_f03];
        $datos2 = Arr::collapse([$c_l,$c_r]);
        //datos f01
        $doc_carta_presentacion=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_presentacion','documentos.id_c_presentacion','=','carta_presentacion.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        //datos carga horaria
        $doc_carga_horaria=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carga_horaria','documentos.id_c_horaria','=','carga_horaria.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        //array 4
        $c_p   = ['carta_presentacion' => $doc_carta_presentacion];
        $c_h   = ['carga_horaria' => $doc_carga_horaria];
        $datos3 = Arr::collapse([$c_p,$c_h]);
        //datos constancia derecho
        $doc_constancia_derecho=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('constancia_derecho','documentos.id_c_derecho','=','constancia_derecho.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        //datos carta responsiva
        $doc_carta_responsiva=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_responsiva','documentos.id_c_responsiva','=','carta_responsiva.id')
        ->where('documentos.id_proceso',$proces)

        ->get();
        //array 5
        $c_d   = ['constancia_derecho' => $doc_constancia_derecho];
        $c_res   = ['carta_responsiva' => $doc_carta_responsiva];
        $datos4 = Arr::collapse([$c_d,$c_res]);
        return view('admin.documentosEstancia1',['documentos'=>$datos,'documentos1'=>$datos1,'documentos2'=>$datos2,'documentos3'=>$datos3,'documentos4'=>$datos4,'proceso'=>$var]);
    }
    public function ver_cd_estancia_f03($id,$name){//#
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
    //ver documento
    public function ver_documento($name,$proces){//*funcion optimizada 
        $nombre='/documentos/'.$name;
        $nombreD= public_path($nombre);
        $resp=file_exists($nombreD);
        if($resp==true){
            return response()->file($nombreD);
        }else return redirect('estancia1_Documentos/'.$proces)->with('sinRespuesta',' Carga horaria no ha sido encontrado');        
    }
    //aceptar documentos->envia correo
    public function aceptar_documento($idU,$id,$proces,$doc) {//*funcion optimizada
        $name=['Carga Horaria','Constancia de Derecho',
        'Carta Responsiva','Carta de Presentación',
        'Carta de Aceptacion','Cedula de Registro',
        'Definicion de Proyecto','Carta de Liberacion'];
        switch ($doc) {
            case 1:$carta=carga_horaria::find($id);
            $carta->estado_c_h=2;
                break;
            case 2:$carta=constancia_derecho::find($id);
            $carta->estado_c_d=2;
                break;
            case 3:$carta=carta_responsiva::find($id);
            $carta->estado_c_r=2;
                break;
            case 4:$carta=carta_presentacion::find($id);
            $carta->estado_c_p=2;
                break;
            case 5:$carta=carta_aceptacion::find($id);
            $carta->estado=2;
                break;
            case 6:$carta=cedula_registro::find($id);
            $carta->estado_c_r=2;
                break;
            case 7:$carta=definicion_proyecto::find($id);
            $carta->estado_d_p=2;
                break;
            case 8:$carta=carta_liberacion::find($id);
            $carta->estado_c_l=2;
                break;
            default:
                # code...
                break;
        }
        $carta->save();
        $resp=$name[$doc-1].' Aceptada y '.CorreoController::store($idU, $name[$doc-1],1);
         return redirect('estancia1_Documentos/'.$proces)->with('aceptado',$resp);
    }
    //documento pendiente->no manda correo
    public function pendiente_documento($idU,$id,$proces,$doc) {//*funcion optimizada
        $name=['Carga Horaria','Constancia de Derecho',
        'Carta Responsiva','Carta de Presentación',
        'Carta de Aceptacion','Cedula de Registro',
        'Definicion de Proyecto','Carta de Liberacion'];
        switch ($doc) {
            case 1:$carta=carga_horaria::find($id);
            $carta->estado_c_h=1;
                break;
            case 2:$carta=constancia_derecho::find($id);
            $carta->estado_c_d=1;
                break;
            case 3:$carta=carta_responsiva::find($id);
            $carta->estado_c_r=1;
                break;
            case 4:$carta=carta_presentacion::find($id);
            $carta->estado_c_p=1;
                break;
            case 5:$carta=carta_aceptacion::find($id);
            $carta->estado=1;
                break;
            case 6:$carta=cedula_registro::find($id);
            $carta->estado_c_r=1;
                break;
            case 7:$carta=definicion_proyecto::find($id);
            $carta->estado_d_p=1;
                break;
            case 8:$carta=carta_liberacion::find($id);
            $carta->estado_c_l=1;
                break;
            default:
                # code...
                break;
        }
        $carta->save();
         return redirect('estancia1_Documentos/'.$proces)->with('pendiente',$name[$doc-1].' Pendiente');
    }
    //vista observaciones carga horaria
    public function observaciones_documento(Request $request, $idU,$proces,$doc) {//*funcion optimizada
        $id_c   = ['id_c'=>$request->input('id_c'), 'idU'=>$idU,'#proces'=>$proces,'#doc'=>$doc];//manda datos a la vista para despues pasarlo a correo
        $datos = Arr::collapse([$id_c]);
        return view('admin.observaciones_estancia_carga_horaria',['datos'=>$datos]);
    }
    //vista observaciones con observaciones carga horaria
    public function conObservaciones_documento_admin(Request $request,$proces,$doc) {//*funcion optimizada
        $id_c   = [ $request->input('id_c')];
        $id_c_r   = ['id_c'=>$request->input('id_c'),'#proces'=>$proces,'#doc'=>$doc];
        $datos = Arr::collapse([$id_c_r]);
        switch ($doc) {
            case 1:$carta=carga_horaria::find($id_c);
                break;
            case 2:$carta=constancia_derecho::find($id_c);
                break;
            case 3:$carta=carta_responsiva::find($id_c);
                break;
            case 4:$carta=carta_presentacion::find($id_c);
                break;
            case 5:$carta=carta_aceptacion::find($id_c);
                break;
            case 6:$carta=cedula_registro::find($id_c);
                break;
            case 7:$carta=definicion_proyecto::find($id_c);
                break;
            case 8:$carta=carta_liberacion::find($id_c);
                break;
            default:
                # code...
                break;
        }
        return view('admin.conObservaciones_estancia_carga_horaria',['datos'=>$carta,'id'=>$datos]);
    }
    //guardar carga horaria->manda correo
    public function  guardarObservaciones_documento_admin(Request $request,$id, $idU,$proces,$doc){//*funcion optimizada
        $observacion= $request->input('observaciones');
        $name=['Carga Horaria','Constancia de Derecho',
        'Carta Responsiva','Carta de Presentación',
        'Carta de Aceptacion','Cedula de Registro',
        'Definicion de Proyecto','Carta de Liberacion'];
        switch ($doc) {
            case 1:$carta=carga_horaria::find($id);
            $carta->estado_c_h=0;
            $carta->observaciones_c_h=$observacion;
                break;
            case 2:$carta=constancia_derecho::find($id);
            $carta->estado_c_d=0;
            $carta->observaciones_c_d=$observacion;
                break;
            case 3:$carta=carta_responsiva::find($id);
            $carta->estado_c_r=0;
            $carta->observaciones_c_r=$observacion;
                break;
            case 4:$carta=carta_presentacion::find($id);
            $carta->estado_c_p=0;
            $carta->observaciones_c_p=$observacion;
                break;
            case 5:$carta=carta_aceptacion::find($id);
            $carta->estado=0;
            $carta->observaciones=$observacion;
                break;
            case 6:$carta=cedula_registro::find($id);
            $carta->estado_c_r=0;
            $carta->observaciones_c_r=$observacion;
                break;
            case 7:$carta=definicion_proyecto::find($id);
            $carta->estado_d_p=0;
            $carta->observaciones_d_p=$observacion;
                break;
            case 8:$carta=carta_liberacion::find($id);
            $carta->estado_c_l=0;
            $carta->observaciones_c_l=$observacion;
                break;
            default:
                # code...
                break;
        }
        $carta->save();
        $resp=$name[$doc-1].' con Observación y '.CorreoController::store($idU, $name[$doc-1],2);
         return redirect('estancia1_Documentos/'.$proces)->with('aceptado',$resp);
    }
    //buscar datos de usuario
    public function buscador_estancia1(Request $request,$proces,$name){//*optimizado
        $var=[$proces,$name];  
        $texto   =trim($request->get('texto'));
        $estatus =trim($request->get('estatus'));
        $año     =trim($request->get('año'));

        $users0 = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->where('users.name','LIKE','%'.$texto.'%')
        ->orWhere('users.email','LIKE','%'.$texto.'%')
        ->get();

        $nombres=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso',$proces)
        ->get();

        $users = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->where('alumno.id_procesos',$proces)
        ->get();

        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->where('documentos.id_proceso','1')
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
        ->where('documentos.id_proceso',$proces)
        ->get();

        $doc_f04=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','documentos.id_d_proyecto','=','definicion_proyecto.id')
        ->where('documentos.id_proceso',$proces)
        ->get();

        $c_a   = ['carta_aceptacion' => $doc_f02];
        $d_p   = ['definicion_proyecto' => $doc_f04];
        $datos1 = Arr::collapse([$c_a,$d_p]);

        $doc_f03=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $doc_f05=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','documentos.id_c_liberacion','=','carta_liberacion.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $c_l   = ['carta_liberacion' => $doc_f05];
        $c_r   = ['cedula_registro' => $doc_f03];
        $datos2 = Arr::collapse([$c_l,$c_r]);

        $doc_carta_presentacion=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_presentacion','documentos.id_c_presentacion','=','carta_presentacion.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $doc_carga_horaria=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carga_horaria','documentos.id_c_horaria','=','carga_horaria.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $c_p   = ['carta_presentacion' => $doc_carta_presentacion];
        $c_h   = ['carga_horaria' => $doc_carga_horaria];
        $datos3 = Arr::collapse([$c_p,$c_h]);

        $doc_constancia_derecho=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('constancia_derecho','documentos.id_c_derecho','=','constancia_derecho.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $doc_carta_responsiva=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_responsiva','documentos.id_c_responsiva','=','carta_responsiva.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $c_d   = ['constancia_derecho' => $doc_constancia_derecho];
        $c_res   = ['carta_responsiva' => $doc_carta_responsiva];
        $datos4 = Arr::collapse([$c_d,$c_res]);

        $alumnos = DB::table('alumno')
        ->where('id_procesos',$proces)
        ->get();

        return view('nombres.Buscar_estancia1',['nombres'=>$nombres,'texto'=>$texto,'estatus'=>$estatus,'año'=>$año,
        'documentos'=>$users0,'documentos1'=>$datos,'documentos2'=>$datos1,'documentos3'=>$datos2,
        'documentos4'=>$datos3,'documentos5'=>$datos4,'alumnos'=>$alumnos,'proceso'=>$var]);
    }

    //buscar usuario lleno cedula de registro
    public function buscador_estancia1_c(Request $request,$proces,$name){//*optimizado
        $var=[$proces,$name];    
        $texto   =trim($request->get('texto'));
        $estatus =trim($request->get('estatus'));
        $año     =trim($request->get('año'));

        $users0 = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('carreras', 'alumno.id_carrera', '=', 'carreras.id_carrera')
        ->where('alumno.id_procesos',$proces)
        ->where('alumno.id_procesos','0')  
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
        ->where('alumno.id_procesos',$proces)
        ->get();

        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->where('documentos.id_proceso',$proces)
        ->get();

        $users1   = ['usuarios' => $users];
        $docs   = ['documentos' => $documentos];
        $datos = Arr::collapse([$users1,$docs]);

        $doc_f02 = DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_aceptacion','documentos.id_c_aceptacion','=','carta_aceptacion.id')
        ->where('documentos.id_proceso',$proces)
        ->get();

        $doc_f04=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','documentos.id_d_proyecto','=','definicion_proyecto.id')
        ->where('documentos.id_proceso',$proces)
        ->get();

        $c_a   = ['carta_aceptacion' => $doc_f02];
        $d_p   = ['definicion_proyecto' => $doc_f04];
        $datos1 = Arr::collapse([$c_a,$d_p]);
        $doc_f03=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','documentos.id_c_registro','=','cedula_registro.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $doc_f05=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','documentos.id_c_liberacion','=','carta_liberacion.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $c_l   = ['carta_liberacion' => $doc_f05];
        $c_r   = ['cedula_registro' => $doc_f03];
        $datos2 = Arr::collapse([$c_l,$c_r]);

        $doc_carta_presentacion=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_presentacion','documentos.id_c_presentacion','=','carta_presentacion.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $doc_carga_horaria=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carga_horaria','documentos.id_c_horaria','=','carga_horaria.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $c_p   = ['carta_presentacion' => $doc_carta_presentacion];
        $c_h   = ['carga_horaria' => $doc_carga_horaria];
        $datos3 = Arr::collapse([$c_p,$c_h]);

        $doc_constancia_derecho=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('constancia_derecho','documentos.id_c_derecho','=','constancia_derecho.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $doc_carta_responsiva=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_responsiva','documentos.id_c_responsiva','=','carta_responsiva.id')
        ->where('documentos.id_proceso',$proces)
        ->get();
        $c_d   = ['constancia_derecho' => $doc_constancia_derecho];
        $c_res   = ['carta_responsiva' => $doc_carta_responsiva];
        $datos4 = Arr::collapse([$c_d,$c_res]);
        $alumnos = DB::table('alumno')
        ->where('id_procesos',$proces)
        ->get();

        return view('nombres.Buscar_estancia1',['nombres'=>$nombres,'texto'=>$texto,'estatus'=>$estatus,'año'=>$año,
        'documentos'=>$users0,'documentos1'=>$datos,'documentos2'=>$datos1,'documentos3'=>$datos2,
        'documentos4'=>$datos3,'documentos5'=>$datos4,'alumnos'=>$alumnos,'proceso'=>$var]);
    }
}
