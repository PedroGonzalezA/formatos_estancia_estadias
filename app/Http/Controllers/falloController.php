<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class falloController extends Controller
{
    //
    public function ver(){
        return view('fallos');
    }

    public function verRegistroFinal(){
        $userID=Auth::user()->id; 

        $datosCedulaFormulario = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->where('users.id',$userID)
        ->get();

        
        $datosCedulaFormularioAlumno = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->where('users.id',$userID)
        ->get();

        $datosCF   = ['datosCedula' => $datosCedulaFormulario];
        $datosCFAlumno   = ['datosCedulaAlumno' => $datosCedulaFormularioAlumno];

        $datos = Arr::collapse([$datosCF,$datosCFAlumno]);
      
        return view('registro_final',['datos'=>$datos,]);
    }
}
