<?php

namespace App\Http\Controllers;
use App\Models\carta_aceptacion;
use App\Models\carta_liberacion;
use App\Models\cedula_registro;
use App\Models\definicion_proyecto;
use App\Models\documentos;
use App\Models\respuesta_doc;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use phpDocumentor\Reflection\Location;

class EstadiaController extends Controller
{
    //
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
        ->select('formulario.id_alumno','formulario.id_empresa','formulario.id_asesor_emp','formulario.id_asesor_aca','formulario.id_proyecto','formulario.id','respuesta.id_usuario','carreras.nombre_carrera','users.name','alumno.ape_paterno','alumno.ape_materno','alumno.nombres','alumno.tel','alumno.matricula','alumno.email_per','alumno.email','alumno.no_ss','alumno.direccion','alumno.id_carrera','empresa.nombre_emp','empresa.giro','empresa.id_tipo','empresa.direccion_emp','empresa.ape_paterno_rh','empresa.ape_materno_rh','empresa.nombres_rh','empresa.tel_lada','empresa.tel_num','empresa.tel_ext','empresa.email_emp','asesor_empresarial.ape_paterno_ae','asesor_empresarial.ape_materno_ae','asesor_empresarial.nombres_ae','asesor_empresarial.id_cargo_ae','asesor_empresarial.tel_lada_ae','asesor_empresarial.tel_num_ae','asesor_empresarial.email_ae','asesor_academico.ape_paterno_aa','asesor_academico.ape_materno_aa','asesor_academico.nombres_aa','asesor_academico.id_cargo_aa','asesor_academico.tel_lada_aa','asesor_academico.tel_num_aa','asesor_academico.email_aa','proyecto.nombre_proyecto')
        ->where('users.id',$userID)
        ->get();

        $datosCedulaFormulario = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->where('users.id',$userID)
        ->get();

        $u   = ['user' => $users];
        $datosCF   = ['datosCedula' => $datosCedulaFormulario];

        $datos = Arr::collapse([$u,$datosCF]);

        $definicionProyecto = DB::table('users')
        ->join('respuesta_def', 'users.id', '=', 'respuesta_def.id_usuario')
        ->join('formulario_def', 'respuesta_def.id_formulario', '=', 'formulario_def.id')
        ->join('alumno_def', 'formulario_def.id_alumno', '=', 'alumno_def.id')
        ->join('asesor_empresarial_def', 'formulario_def.id_asesor_emp', '=', 'asesor_empresarial_def.id')
        ->join('proyecto_def', 'formulario_def.id_proyecto', '=', 'proyecto_def.id')
        ->join('detalle_def','formulario_def.id_detalle','=','detalle_def.id')
        ->where('users.id',$userID)

        ->get();
        $datosDefinicionProyecto = DB::table('users')
        ->join('respuesta_def', 'users.id', '=', 'respuesta_def.id_usuario')
        ->join('formulario_def', 'respuesta_def.id_formulario', '=', 'formulario_def.id')
        ->where('users.id',$userID)
        ->get();

        $defP  = ['def' => $definicionProyecto];
        $datosDp  = ['datosDef' => $datosDefinicionProyecto];

        $datos1 = Arr::collapse([$defP,$datosDp]);
        
        $documentos=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->where('users.id',$userID)
        ->get();

        $cedula_doc=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','cedula_registro.id','=','documentos.id_c_registro')
        ->select('documentos.id_c_registro','cedula_registro.nombre_c_r','cedula_registro.estado_c_r','cedula_registro.observaciones_c_r','documentos.id','respuesta_doc.id_documentos','users.name')
        ->where('users.id',$userID)
        ->get();
        
        $docs  = ['documentos' => $documentos];
        $cedula_docs  = ['cedula_registro' => $cedula_doc];
        $datos2 = Arr::collapse([$docs,$cedula_docs]);
        
         //datos f04 doc
         $definicion_Proyecto_doc=DB::table('users')
         ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
         ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
         ->join('definicion_proyecto','definicion_proyecto.id','=','documentos.id_d_proyecto')
         ->select('documentos.id_d_proyecto','definicion_proyecto.nombre_d_p','definicion_proyecto.estado_d_p','definicion_proyecto.observaciones_d_p','documentos.id','respuesta_doc.id_documentos','users.name')
         ->where('users.id',$userID)
         ->get();
         //etapas de proyecto
         $etapas=DB::table('users')
         ->join('respuesta_etapa','users.id','=','respuesta_etapa.id_usuario')
         ->join('etapas_del_proyecto','etapas_del_proyecto.id','=','respuesta_etapa.id_etapa_proyecto')
         ->where('users.id',$userID)
         ->get();

         $etapas  = ['etapas' => $etapas];
         $defini  = ['definicion_proyecto' => $definicion_Proyecto_doc];
         $datos3 = Arr::collapse([$etapas,$defini]);
 
         //datos f02 doc
         $carta_aceptacion=DB::table('users')
         ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
         ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
         ->join('carta_aceptacion','carta_aceptacion.id','=','documentos.id_c_aceptacion')
         ->select('documentos.id_c_aceptacion','carta_aceptacion.nombre','carta_aceptacion.estado','carta_aceptacion.observaciones','documentos.id','respuesta_doc.id_documentos','users.name')
         ->where('users.id',$userID)
         ->get();
         //datos f05 doc
         $carta_liberacion =DB::table('users')
         ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
         ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
         ->join('carta_liberacion','carta_liberacion.id','=','documentos.id_c_liberacion')
         ->select('documentos.id_c_liberacion','carta_liberacion.nombre_c_l','carta_liberacion.estado_c_l','carta_liberacion.observaciones_c_l','documentos.id','respuesta_doc.id_documentos','users.name')
         ->where('users.id',$userID)
         ->get();

         $carta_ace  = ['carta_aceptacion' => $carta_aceptacion];
         $carta_lib = ['carta_liberacion' => $carta_liberacion];
         $datos4 = Arr::collapse([$carta_ace,$carta_lib]);

        return view('estadia',['datos'=>$datos,'definicionP'=>$datos1,'documentos'=>$datos2,'etapas'=>$datos3,'carta_aceptacion'=>$datos4]);
   }
   //subir documento sin datos f02
   public function subirF02_estadia(Request $request, $name,$nombre){
    
    $request->validate([
        "f02" => "required|mimetypes:application/pdf|max:30000"
    ]);
    $arrayResult = array();

    try{
        if($request->hasFile('f02')){
            $archivo=$request->file('f02');
            $nombreA=$archivo->getClientOriginalName();
            $nombreAF=$name.$nombreA;

            $archivo->move(public_path().'/documentos/',$nombreAF);
            
        }
        $data5 = array(

            'nombre'   => $nombreAF,
            'estado'=> 1
        );
    
        $response_c_aceptacion = carta_aceptacion::requestInsertcartaA($data5);
        if (isset($response_c_aceptacion["code"]) && $response_c_aceptacion["code"] == 200) {
            $arrayResult = array(
                'Response'  => array(
                    'ok'        => true,
                    'message'   => "Se ha guardado el registro",
                    'code'      => "200",
                ),
            );
    
        } else {
            $arrayResult = array(
                'Response'  => array(
                    'ok'        => false,
                    'message'   => $response_c_aceptacion['message'],
                    'code'      => $response_c_aceptacion['code']
                ),
            );
        }
        $data6 = array(
            'id_c_aceptacion'     =>  $response_c_aceptacion['id'],
            'id_proceso'             =>  3
        );
        $response_documentos = documentos::requestInsertDoc($data6);
    
        if (isset($response_documentos["code"]) && $response_documentos["code"] == 200) {
            $arrayResult = array(
                'Response'  => array(
                    'ok'        => true,
                    'message'   => "Se ha guardado el registro",
                    'code'      => "200",
                ),
            );
    
        } else {
            $arrayResult = array(
                'Response'  => array(
                    'ok'        => false,
                    'message'   => $response_documentos['message'],
                    'code'      => $response_documentos['code']
                ),
            );
        }
    
        $data7 = array(
            'id_usuario'    => Auth::user()->id,
            'id_documentos' => $response_documentos['id']
        );
    
        $response_respuesta = respuesta_doc::requestInsertRespuesta($data7);
        
        

    } catch(\Illuminate\Database\QueryException $ex) {
        $arrayResult = array(
            'Response'  => array(
                'message'   => "Error: " . " - " . "Fallo :v",
                "code"      => "500"
            )
        );
    } catch( Exception $ex ){
        $arrayResult = array(
        'Response' => array(
            'message' => "Error: " . " - " . $ex->getMessage(),
            "code"    => "500"
        )
        );
    }
    return redirect('estadia')->with('success','Documento agregado');
}
//actualizar documento f02
    public function actualizarF02_estadia(Request $request, $name,$nombre){
        
        $request->validate([
            "f02" => "required|mimetypes:application/pdf|max:10000"
        ]);
        $arrayResult = array();

        try{
            if($request->hasFile('f02')){
                $archivo=$request->file('f02');
                $nombreA=$archivo->getClientOriginalName();
                $nombreAF=$name.$nombreA;

                $archivo->move(public_path().'/documentos/',$nombreAF);
                
            }
            $data5 = array(

                'nombre'   => $nombreAF,
                'estado'=> 1
            );
        
            $response_carta_aceptacion = carta_aceptacion::requestInsertcartaA($data5);
            if (isset($response_carta_aceptacion["code"]) && $response_carta_aceptacion["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_carta_aceptacion['message'],
                        'code'      => $response_carta_aceptacion['code']
                    ),
                );
            }
            $carta=documentos::find($request->get('id_docf02'));
            $carta->id_c_aceptacion=$response_carta_aceptacion['id'];
            $carta->save();
            

        } catch(\Illuminate\Database\QueryException $ex) {
            $arrayResult = array(
                'Response'  => array(
                    'message'   => "Error: " . " - " . "Fallo :v",
                    "code"      => "500"
                )
            );
        } catch( Exception $ex ){
            $arrayResult = array(
            'Response' => array(
                'message' => "Error: " . " - " . $ex->getMessage(),
                "code"    => "500"
            )
            );
        }
        return redirect('estadia')->with('success','Documento agregado');

    }
    public function verObservaciones_f02_estadia(){
        $userID=Auth::user()->id; 
        $cedula_doc=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_aceptacion','carta_aceptacion.id','=','documentos.id_c_aceptacion')
        ->select('documentos.id_c_aceptacion','carta_aceptacion.nombre','carta_aceptacion.estado','carta_aceptacion.observaciones','respuesta_doc.id_documentos','respuesta_doc.id_documentos','users.name')
        ->where('users.id',$userID)
        ->get();
        return view('usuario.observaciones_f02_estadia',['datos'=>$cedula_doc]);
    }
//subir documento sin datos f03
    public function subirF03_estadia(Request $request, $name,$nombre){
        
        $request->validate([
            "f03" => "required|mimetypes:application/pdf|max:10000"
        ]);
        $arrayResult = array();

        try{
            if($request->hasFile('f03')){
                $archivo=$request->file('f03');
                $nombreA=$archivo->getClientOriginalName();
                $nombreAF=$name.$nombreA;

                $archivo->move(public_path().'/documentos/',$nombreAF);
                
            }
            $data5 = array(

                'nombre_c_r'   => $nombreAF,
                'estado_c_r'=> 1
                //'ID_Alumno'         => $response_alumno['id']
            );
        
            $response_c_registro = cedula_registro::requestInsertCedulaR($data5);
            if (isset($response_c_registro["code"]) && $response_c_registro["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_c_registro['message'],
                        'code'      => $response_c_registro['code']
                    ),
                );
            }
            $data6 = array(
                'id_c_registro'     =>  $response_c_registro['id'],
                'id_proceso'             =>  3
            );
            $response_documentos = documentos::requestInsertDoc($data6);
        
            if (isset($response_documentos["code"]) && $response_documentos["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_documentos['message'],
                        'code'      => $response_documentos['code']
                    ),
                );
            }
        
            $data7 = array(
                'id_usuario'    => Auth::user()->id,
                'id_documentos' => $response_documentos['id']
            );
        
            $response_respuesta = respuesta_doc::requestInsertRespuesta($data7);
            
            

        } catch(\Illuminate\Database\QueryException $ex) {
            $arrayResult = array(
                'Response'  => array(
                    'message'   => "Error: " . " - " . "Fallo :v",
                    "code"      => "500"
                )
            );
        } catch( Exception $ex ){
            $arrayResult = array(
            'Response' => array(
                'message' => "Error: " . " - " . $ex->getMessage(),
                "code"    => "500"
            )
            );
        }
        return redirect('estadia')->with('success','Documento agregado');
    }
//actualizar documento f03
    public function actualizarF03_estadia(Request $request, $name,$nombre){

        $request->validate([
            "f03" => "required|mimetypes:application/pdf|max:10000"
        ]);
        $arrayResult = array();

        try{
            if($request->hasFile('f03')){
                $archivo=$request->file('f03');
                $nombreA=$archivo->getClientOriginalName();
                $nombreAF=$name.$nombreA;

                $archivo->move(public_path().'/documentos/',$nombreAF);
                
            }
            $data5 = array(

                'nombre_c_r'   => $nombreAF,
                'estado_c_r'=> 1
            );
        
            $response_cedula_registro = cedula_registro::requestInsertCedulaR($data5);
            if (isset($response_cedula_registro["code"]) && $response_cedula_registro["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_cedula_registro['message'],
                        'code'      => $response_cedula_registro['code']
                    ),
                );
            }
            $carta=documentos::find($request->get('id_docf03'));
            $carta->id_c_registro=$response_cedula_registro['id'];
            $carta->save();
            

        } catch(\Illuminate\Database\QueryException $ex) {
            $arrayResult = array(
                'Response'  => array(
                    'message'   => "Error: " . " - " . "Fallo :v",
                    "code"      => "500"
                )
            );
        } catch( Exception $ex ){
            $arrayResult = array(
            'Response' => array(
                'message' => "Error: " . " - " . $ex->getMessage(),
                "code"    => "500"
            )
            );
        }
        return redirect('estadia')->with('success','Documento agregado');

    }
    public function verObservaciones_f03_estadia(){
        $userID=Auth::user()->id; 
        $cedula_doc=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('cedula_registro','cedula_registro.id','=','documentos.id_c_registro')
        ->select('documentos.id_c_registro','cedula_registro.nombre_c_r','cedula_registro.estado_c_r','cedula_registro.observaciones_c_r','respuesta_doc.id_documentos','respuesta_doc.id_documentos','users.name')
        ->where('users.id',$userID)
        ->get();
        return view('usuario.observaciones_f03_estadia',['datos'=>$cedula_doc]);
    }
    //subir documento sin datos f04
    public function subirF04_estadia(Request $request, $name,$nombre){
    
        $request->validate([
            "f04" => "required|mimetypes:application/pdf|max:10000"
        ]);
        $arrayResult = array();

        try{
            if($request->hasFile('f04')){
                $archivo=$request->file('f04');
                $nombreA=$archivo->getClientOriginalName();
                $nombreAF=$name.$nombreA;

                $archivo->move(public_path().'/documentos/',$nombreAF);
                
            }
            $data5 = array(

                'nombre_d_p'   => $nombreAF,
                'estado_d_p'=> 1
                //'ID_Alumno'         => $response_alumno['id']
            );
        
            $response_d_proyecto = definicion_proyecto::requestInsertDefinicionP($data5);
            if (isset($response_d_proyecto["code"]) && $response_d_proyecto["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_d_proyecto['message'],
                        'code'      => $response_d_proyecto['code']
                    ),
                );
            }
            $data6 = array(
                'id_c_registro'     =>  $response_d_proyecto['id'],
                'id_proceso'             =>  3
            );
            $response_documentos = documentos::requestInsertDoc($data6);
        
            if (isset($response_documentos["code"]) && $response_documentos["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_documentos['message'],
                        'code'      => $response_documentos['code']
                    ),
                );
            }
        
            $data7 = array(
                'id_usuario'    => Auth::user()->id,
                'id_documentos' => $response_documentos['id']
            );
        
            $response_respuesta = respuesta_doc::requestInsertRespuesta($data7);
            
            

        } catch(\Illuminate\Database\QueryException $ex) {
            $arrayResult = array(
                'Response'  => array(
                    'message'   => "Error: " . " - " . "Fallo :v",
                    "code"      => "500"
                )
            );
        } catch( Exception $ex ){
            $arrayResult = array(
            'Response' => array(
                'message' => "Error: " . " - " . $ex->getMessage(),
                "code"    => "500"
            )
            );
        }
        return redirect('estadia')->with('success','Documento agregado');
    }
//actualizar documento f04
    public function actualizarF04_estadia(Request $request, $name,$nombre){
        
        $request->validate([
            "f04" => "required|mimetypes:application/pdf|max:10000"
        ]);
        $arrayResult = array();

        try{
            if($request->hasFile('f04')){
                $archivo=$request->file('f04');
                $nombreA=$archivo->getClientOriginalName();
                $nombreAF=$name.$nombreA;

                $archivo->move(public_path().'/documentos/',$nombreAF);
                
            }
            $data5 = array(

                'nombre_d_p'   => $nombreAF,
                'estado_d_p'=> 1
            );
        
            $response_d_proyecto = definicion_proyecto::requestInsertDefinicionP($data5);
            if (isset($response_d_proyecto["code"]) && $response_d_proyecto["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_d_proyecto['message'],
                        'code'      => $response_d_proyecto['code']
                    ),
                );
            }
            $carta=documentos::find($request->get('id_docf04'));
            $carta->id_d_proyecto=$response_d_proyecto['id'];
            $carta->save();
            

        } catch(\Illuminate\Database\QueryException $ex) {
            $arrayResult = array(
                'Response'  => array(
                    'message'   => "Error: " . " - " . "Fallo :v",
                    "code"      => "500"
                )
            );
        } catch( Exception $ex ){
            $arrayResult = array(
            'Response' => array(
                'message' => "Error: " . " - " . $ex->getMessage(),
                "code"    => "500"
            )
            );
        }
        return redirect('estadia')->with('success','Documento agregado');

    }
    public function verObservaciones_f04_estadia(){
        $userID=Auth::user()->id; 
        $cedula_doc=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('definicion_proyecto','definicion_proyecto.id','=','documentos.id_d_proyecto')
        ->select('documentos.id_d_proyecto','definicion_proyecto.nombre_d_p','definicion_proyecto.estado_d_p','definicion_proyecto.observaciones_d_p','respuesta_doc.id_documentos','respuesta_doc.id_documentos','users.name')
        ->where('users.id',$userID)
        ->get();
        return view('usuario.observaciones_f04_estadia',['datos'=>$cedula_doc]);
    }

     //subir documento sin datos f05
     public function subirF05_estadia(Request $request, $name,$nombre){
    
        $request->validate([
            "f05" => "required|mimetypes:application/pdf|max:10000"
        ]);
        $arrayResult = array();

        try{
            if($request->hasFile('f05')){
                $archivo=$request->file('f05');
                $nombreA=$archivo->getClientOriginalName();
                $nombreAF=$name.$nombreA;

                $archivo->move(public_path().'/documentos/',$nombreAF);
                
            }
            $data5 = array(

                'nombre_c_l'   => $nombreAF,
                'estado_c_l'=> 1
                //'ID_Alumno'         => $response_alumno['id']
            );
        
            $response_c_liberacion = carta_liberacion::requestInsertcartaL($data5);
            if (isset($response_c_liberacion["code"]) && $response_c_liberacion["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_c_liberacion['message'],
                        'code'      => $response_c_liberacion['code']
                    ),
                );
            }
            $data6 = array(
                'id_c_liberacion'     =>  $response_c_liberacion['id'],
                'id_proceso'             =>  3
            );
            $response_documentos = documentos::requestInsertDoc($data6);
        
            if (isset($response_documentos["code"]) && $response_documentos["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_documentos['message'],
                        'code'      => $response_documentos['code']
                    ),
                );
            }
        
            $data7 = array(
                'id_usuario'    => Auth::user()->id,
                'id_documentos' => $response_documentos['id']
            );
        
            $response_respuesta = respuesta_doc::requestInsertRespuesta($data7);
            
            

        } catch(\Illuminate\Database\QueryException $ex) {
            $arrayResult = array(
                'Response'  => array(
                    'message'   => "Error: " . " - " . "Fallo :v",
                    "code"      => "500"
                )
            );
        } catch( Exception $ex ){
            $arrayResult = array(
            'Response' => array(
                'message' => "Error: " . " - " . $ex->getMessage(),
                "code"    => "500"
            )
            );
        }
        return redirect('estadia')->with('success','Documento agregado');
    }
//actualizar documento f05
    public function actualizarF05_estadia(Request $request, $name,$nombre){
        
        $request->validate([
            "f05" => "required|mimetypes:application/pdf|max:10000"
        ]);
        $arrayResult = array();

        try{
            if($request->hasFile('f05')){
                $archivo=$request->file('f05');
                $nombreA=$archivo->getClientOriginalName();
                $nombreAF=$name.$nombreA;

                $archivo->move(public_path().'/documentos/',$nombreAF);
                
            }
            $data5 = array(

                'nombre_c_l'   => $nombreAF,
                'estado_c_l'=> 1
            );
        
            $response_c_liberacion = carta_liberacion::requestInsertcartaL($data5);
            if (isset($response_c_liberacion["code"]) && $response_c_liberacion["code"] == 200) {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => true,
                        'message'   => "Se ha guardado el registro",
                        'code'      => "200",
                    ),
                );
        
            } else {
                $arrayResult = array(
                    'Response'  => array(
                        'ok'        => false,
                        'message'   => $response_c_liberacion['message'],
                        'code'      => $response_c_liberacion['code']
                    ),
                );
            }
            $carta=documentos::find($request->get('id_docf05'));
            $carta->id_c_liberacion=$response_c_liberacion['id'];
            $carta->save();
            

        } catch(\Illuminate\Database\QueryException $ex) {
            $arrayResult = array(
                'Response'  => array(
                    'message'   => "Error: " . " - " . "Fallo :v",
                    "code"      => "500"
                )
            );
        } catch( Exception $ex ){
            $arrayResult = array(
            'Response' => array(
                'message' => "Error: " . " - " . $ex->getMessage(),
                "code"    => "500"
            )
            );
        }
        return redirect('estadia')->with('success','Documento agregado');

    }
    //observaciones f05
    public function verObservaciones_f05_Estadia(){
        $userID=Auth::user()->id; 
        $cedula_doc=DB::table('users')
        ->join('respuesta_doc','users.id','=','respuesta_doc.id_usuario')
        ->join('documentos','documentos.id','=','respuesta_doc.id_documentos')
        ->join('carta_liberacion','carta_liberacion.id','=','documentos.id_c_liberacion')
        ->select('documentos.id_c_liberacion','carta_liberacion.nombre_c_l','carta_liberacion.estado_c_l','carta_liberacion.observaciones_c_l','respuesta_doc.id_documentos','respuesta_doc.id_documentos','users.name')
        ->where('users.id',$userID)
        ->get();
        return view('usuario.observaciones_f05_estadia',['datos'=>$cedula_doc]);
    }
}
