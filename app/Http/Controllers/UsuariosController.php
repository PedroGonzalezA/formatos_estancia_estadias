<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Exception;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function create() {

        try {

            $respuestas = Respuesta::getAllRespuesta();

            $data = array(
                'respuestas' => $respuestas
            );

            return view('admin.usuarios', $data);
        } catch(\Illuminate\Database\QueryException $ex ) {
            dd("Error");
        } catch(Exception $ex ) {
            dd("Error" . $ex->getMessage());
        }
    }
}
