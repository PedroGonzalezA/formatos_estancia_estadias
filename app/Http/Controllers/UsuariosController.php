<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use App\Models\User;
use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
class UsuariosController extends Controller
{
    public function create() {;

        try {

            $users = DB::table('users')->orderBy('id','ASC')->get();


            $respuestas = DB::table('users')
            ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
            ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
            ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
            ->join('procesos', 'procesos.id_procesos', '=', 'alumno.id_procesos')
            ->join('carreras', 'carreras.id_carrera', '=', 'alumno.id_carrera')

            ->orderBy('users.id','ASC')
            ->get();
            

            $u   = ['users' => $users];
            $r   = ['respuestas' => $respuestas];
            $datos = Arr::collapse([$u,$r]);
    
            return view('admin.usuarios', ['datos'=>$datos]);
        } catch(\Illuminate\Database\QueryException $ex ) {
            dd("Error");
        } catch(Exception $ex ) {
            dd("Error" . $ex->getMessage());
        }
    }

    public function eliminarUsuario($id){
        $respuestas = DB::table('users')
        ->where('id',$id)
        ->delete();
        return redirect('/usuarios')->with('warning','Usuario eliminado');
    }

    public function buscarUsuario(Request $request){
        $texto   =trim($request->get('texto'));

        $users = DB::table('users')
        ->where('users.name','LIKE','%'.$texto.'%')
        ->orWhere('users.email','LIKE','%'.$texto.'%')
        ->orWhere('users.role','LIKE','%'.$texto.'%')
        ->orWhere('users.id','LIKE','%'.$texto.'%')
        ->get();

       

        $respuestas = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('procesos', 'procesos.id_procesos', '=', 'alumno.id_procesos')
        ->join('carreras', 'carreras.id_carrera', '=', 'alumno.id_carrera')

        ->orderBy('users.id','ASC')
        ->get();

        $u   = ['users' => $users];
        $r   = ['respuestas' => $respuestas];
        $datos = Arr::collapse([$u,$r]);

        return view('nombres.buscar_usuario',['texto'=>$texto,'datos'=>$datos]);
    }

    public function buscarUsuarioDatos(Request $request){
        $texto   =trim($request->get('texto'));

        $users = DB::table('users')
        ->where('users.name','LIKE','%'.$texto.'%')
        ->orWhere('users.email','LIKE','%'.$texto.'%')
        ->orWhere('users.id','LIKE','%'.$texto.'%')
        ->get();

       

        $respuestas = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('procesos', 'procesos.id_procesos', '=', 'alumno.id_procesos')
        ->join('carreras', 'carreras.id_carrera', '=', 'alumno.id_carrera')

        ->orderBy('users.id','ASC')
        ->get();

        $u   = ['users' => $users];
        $r   = ['respuestas' => $respuestas];
        $datos = Arr::collapse([$u,$r]);

        $respuestas1 = DB::table('users')
        ->join('respuesta', 'users.id', '=', 'respuesta.id_usuario')
        ->join('formulario', 'respuesta.id_formulario', '=', 'formulario.id')
        ->join('alumno', 'formulario.id_alumno', '=', 'alumno.id')
        ->join('procesos', 'procesos.id_procesos', '=', 'alumno.id_procesos')
        ->join('carreras', 'carreras.id_carrera', '=', 'alumno.id_carrera')
        ->where('alumno.nombres','LIKE','%'.$texto.'%')
        ->orWhere('alumno.matricula','LIKE','%'.$texto.'%')
        ->orWhere('alumno.ape_paterno','LIKE','%'.$texto.'%')
        ->orWhere('alumno.ape_materno','LIKE','%'.$texto.'%')
        ->orWhere('carreras.nombre_carrera','LIKE','%'.$texto.'%')
        ->orWhere('procesos.nombre_proceso','LIKE','%'.$texto.'%')


        ->orderBy('users.id','ASC')
        ->get();
        return view('nombres.buscar_usuario_datos',['texto'=>$texto,'datos'=>$datos,'res'=>$respuestas1]);
    }

    public function ver(){
        return view('admin.agregar_usuario');
    }
    public function ver_datos_usuario($id){
        $datos=DB::table('users')->where('id',$id)->get();
        return view('admin.editar_datos_usuario',['datos'=>$datos]);
    }

    public function editar_datos_usuario($id){
        $this->validate(request(), [
            'name' => 'integer',
            'email' => 'email',
            'password' => 'required'
        ]);
        $user=User::find($id);
        $user->name=request('name');
        $user->email=request('email');
        $user->password=request('password');
        $user->save();
        return redirect()->to('/usuarios')->with('success','Datos cambiados');
    }
}
