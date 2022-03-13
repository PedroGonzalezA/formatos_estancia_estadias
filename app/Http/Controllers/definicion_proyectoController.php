<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\alumno_def;
use App\Models\Asesor_Aca;
use App\Models\Asesor_Emp;
use App\Models\asesor_empresarial_def;
use App\Models\detalle_def;
use App\Models\Empresa;
use App\Models\Proyecto;
use App\Models\Formulario;
use App\Models\formulario_def;
use App\Models\proyecto_def;
use App\Models\Respuesta;
use App\Models\respuesta_def;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class definicion_proyectoController extends Controller
{
    //
    public function store(Request $request) {
      
        $arrayResult = array();

        try{

            
            $grupo                 = $request->input('grupo');
            $procesos              = json_decode( $request->input('id_proceso') );
          
            $puesto                = $request->input('puesto');
            
            $objetivos_pro         = $request->input('objetivosP');

            $actividades           = $request->input('actividades');
            $resultados            = $request->input('resultados');
            $evidencia             = $request->input('evidencia');
            $instrumentos          = $request->input('instrumentos');
            $asignaturas           = $request->input('asignaturas');
            $topicos               = $request->input('topicos');
            $estrategias           = $request->input('estrategias');

    //alumno
            $data1 = array(
                'grupo'     =>  $grupo,
                'id_proceso' =>  $procesos,
            );
            $response_a_d = alumno_def::requestInsertAlumnoD($data1);
            if (isset($response_a_d["code"]) && $response_a_d["code"] == 200) {
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
                        'message'   => $response_a_d['message'],
                        'code'      => $response_a_d['code']
                    ),
                );
            }

    //asesor empresarial
            $data2 = array(
                'puesto'     =>  $puesto,
            );
            $response_a_e_d = asesor_empresarial_def::requestInsertAsesor_EmpD($data2);
            if (isset($response_a_e_d["code"]) && $response_a_e_d["code"] == 200) {
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
                        'message'   => $response_a_e_d['message'],
                        'code'      => $response_a_e_d['code']
                    ),
                );
            }

    //proyecto
            $data3 = array(
                'objetivos_proyecto'     =>  $objetivos_pro,
            );
            $response_p_d = proyecto_def::requestInsertProyectoD($data3);
            if (isset($response_p_d["code"]) && $response_p_d["code"] == 200) {
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
                        'message'   => $response_p_d['message'],
                        'code'      => $response_p_d['code']
                    ),
                );
            }
//detalles
                $data4 = array(
                    'actividades' => $actividades ,        
                    'resultados'  => $resultados,                    
                    'evidencia'   => $evidencia,          
                    'instrumentos'=> $instrumentos,        
                    'asignaturas' => $asignaturas,        
                    'topicos'     => $topicos,         
                    'estrategias' => $estrategias,
                );
                $response_d_d = detalle_def::requestInsertDetalle($data4);
                if (isset($response_d_d["code"]) && $response_d_d["code"] == 200) {
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
                            'message'   => $response_d_d['message'],
                            'code'      => $response_d_d['code']
                        ),
                    );
                }

           
    //formulario
            $data5 = array(
                'id_alumno'     =>  $response_a_d['id'],
                'id_asesor_emp' =>  $response_a_e_d['id'],
                'id_proyecto'   =>  $response_p_d['id'],
                'id_detalle' =>  $response_d_d['id'],

            );
            $response_f_d = formulario_def::requestInsertFormularioD($data5);
            if (isset($response_f_d["code"]) && $response_f_d["code"] == 200) {
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
                        'message'   => $response_f_d['message'],
                        'code'      => $response_f_d['code']
                    ),
                );
            }

    //respuesta
            $data6 = array(
                'id_usuario_d_p'     =>  Auth::user()->id,
                'id_formulario_d_p'  => $response_f_d['id']
            );
            $response_r_d = respuesta_def::requestInsertRespuesta_def($data6);
            if (isset($response_r_d["code"]) && $response_r_d["code"] == 200) {
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
                        'message'   => $response_r_d['message'],
                        'code'      => $response_r_d['code']
                    ),
                );
            }

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
        
        return redirect('registro_final_definicion');
    }
}
