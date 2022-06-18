<?php

use App\Http\Controllers\CedulaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\carta_aceptacionController;
use App\Http\Controllers\datosController;
use App\Http\Controllers\definicion_proyectoController;
use App\Http\Controllers\definicionController;
use App\Http\Controllers\DescargaController;
use App\Http\Controllers\documentosEstadiaAdminController;
use App\Http\Controllers\documentosEstadiaNacionalAdminController;
use App\Http\Controllers\documentosEstancia1AdminController;
use App\Http\Controllers\documentosEstancia2AdminController;
use App\Http\Controllers\documentosServicioSocialAdminController;
use App\Http\Controllers\Estadia_NacionalesController;
use App\Http\Controllers\EstadiaController;
use App\Http\Controllers\Estancia1Controller;
use App\Http\Controllers\Estancia2Controller;
use App\Http\Controllers\falloController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ScrollController;
use App\Http\Controllers\servicio_socialesController;
use App\Http\Controllers\UsuariosController;
use App\Models\documentos;
use App\Models\Formulario;
use App\Models\universidad;
use League\CommonMark\Block\Element\Document;

/*  
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
})->middleware('login');

Route::get('/register', [RegisterController::class, 'create'])
->middleware('login')
->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');



Route::get('/login', [LoginController::class, 'create'])
    ->middleware('login')
    ->name('login.index');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

//admin
    //editar contra vista
    Route::get('/admin_ver_editar', [AdminController::class, 'ver'])
    ->middleware('auth.admin')
    ->name('admin_ver_editar.index');
    
    //editar contra
    Route::match(['post','get','put'],'/admin_editar', [AdminController::class, 'editar'])
    ->middleware('auth.admin')
    ->name('admin_editar.index');

    //dashboard
    Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

//Ver usuarios
     Route::get('/usuarios', [UsuariosController::class, 'create'])
    ->name('usuarios.index')
    ->middleware('auth.admin');
       
         //buscardor
         Route::get('/buscar_usuario', [UsuariosController::class, 'buscarUsuario'])
         ->name('buscar_usuario.index')
         ->middleware('auth.admin');

          //buscardor datos
          Route::get('/buscar_datos', [UsuariosController::class, 'buscarUsuarioDatos'])
          ->name('buscar_usuario_datos.index')
          ->middleware('auth.admin');

          //agregar usuario
          Route::get('/agregar_usuario', [UsuariosController::class, 'ver'])
          ->name('agregar_usuario.index')
          ->middleware('auth.admin');

          //registrar usuario
          Route::post('/registrar', [RegisterController::class, 'registrar'])
         ->name('registrar_usuario.index');

         //cambiar datos usuario
         Route::match(['post','get','delete'],'/ver_datos_usuario_{id}', [UsuariosController::class, 'ver_datos_usuario'])
        ->name('ver_datos_usuario.index');
        
        //editar datos usuario
        Route::match(['post','get','delete'],'/editar_datos_usuario_{id}', [UsuariosController::class, 'editar_datos_usuario'])
        ->name('editar_datos_usuario.index');
        
         //eliminarusuarios
         Route::match(['post','get','delete'],'/eliminar_usuario_{id}', [UsuariosController::class, 'eliminarUsuario'])
         ->name('eliminarUsuario.index');

          //eliminarusuarios
         Route::match(['post','get','delete'],'/eliminar_usuarioC_{id}', [UsuariosController::class, 'eliminarUsuarioC'])
         ->name('eliminarUsuarioCompleto.index');

         //restaurar usuarios
         Route::match(['post','get','delete'],'/restaurar_usuario_{id}', [UsuariosController::class, 'restaurarUsuario'])
         ->name('restaurarUsuario.index');

//cambiar datos director
    Route::get('/datos', [datosController::class, 'ver'])
    ->name('datos.index')
    ->middleware('auth.admin');

        //guardar datos vinculacion
           Route::match(['post','get','put'],'/guardar_datos_vinculacion', [datosController::class, 'guardar'])
           ->name('guardar_vinculacion.index');

        //actualizar datos vinculacion
        Route::match(['post','get','put'],'/actualizar_datos_vinculacion', [datosController::class, 'actualizar'])
        ->name('actualizar_vinculacion.index');  

        //imagen
        Route::match(['post','get','put'],'/imagen/{filename}', [datosController::class, 'imagen'])
        ->name('imagen.index');      
//estancia 1
    Route::match(['post','get'],'/estancia1_Documentos', [documentosEstancia1AdminController::class, 'ver'])
    ->name('documentoEstancia1Admin.index')
    ->middleware('auth.admin');
    //Carga horaria
         //ver con datos carga_horaria
         Route::match(['post','get'],'/ver_cd_estancia_carga_horaria/admin/{name}', [documentosEstancia1AdminController::class, 'ver_cd_estancia_carga_horaria_admin'])
         ->name('ver_cd_estancia_carga_horaria_admin.index')
         ->middleware('auth.admin');
 
         //aceptar carga horaria
         Route::match(['post','get','put'],'/aceptar_estancia1_carga_horaria/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'aceptar_estancia_carga_horaria_admin'])
         ->name('aceptar_estancia1_carga_horaria_admin.index');
 
         //pendiente constancia derecho
         Route::match(['post','get','put'],'/pendiente_estancia1_carga_horaria/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'pendiente_estancia_carga_horaria_admin'])
         ->name('pendiente_estancia1_carga_horaria_admin.index');
 
         //observaciones  constancia derecho
         Route::match(['post','get','put'],'/observaciones_estancia_carga_horaria_admin', [documentosEstancia1AdminController::class, 'observaciones_estancia_carga_horaria_admin'])
         ->name('observaciones_estancia_carga_horaria_admin.index')
         ->middleware('auth.admin');
 
         //guardar observaciones constancia derecho
         Route::match(['get','post','put'],'/guardar_observaciones_estancia_carga_horaria_admin/{id}', [documentosEstancia1AdminController::class, 'guardarObservaciones_estancia_carga_horaria_admin'])
         ->name('guardarObservaciones_estancia_carga_horaria_admin.index');
 
         //con Observaciones constancia derecho
         Route::match(['post','get'],'/con_Observaciones_estancia_carga_horaria_admin', [documentosEstancia1AdminController::class, 'conObservaciones_estancia_carga_horaria_admin'])
         ->name('conObservaciones_estancia_carga_horaria_admin.index')
         ->middleware('auth.admin');
    //constancia derecho
         //ver con datos constancia derecho
         Route::match(['post','get'],'/ver_cd_estancia_constancia_derecho/admin/{name}', [documentosEstancia1AdminController::class, 'ver_cd_estancia_constancia_derecho_admin'])
         ->name('ver_cd_estancia_constancia_derecho_admin.index')
         ->middleware('auth.admin');
 
         //aceptar  constancia derecho
         Route::match(['post','get','put'],'/aceptar_estancia1_constancia_derecho/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'aceptar_estancia_constancia_derecho_admin'])
         ->name('aceptar_estancia1_constancia_derecho_admin.index');
 
         //pendiente constancia derecho
         Route::match(['post','get','put'],'/pendiente_estancia1_constancia_derecho/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'pendiente_estancia_constancia_derecho_admin'])
         ->name('pendiente_estancia1_constancia_derecho_admin.index');
 
         //observaciones  constancia derecho
         Route::match(['post','get','put'],'/observaciones_estancia_constancia_derecho_admin', [documentosEstancia1AdminController::class, 'observaciones_estancia_constancia_derecho_admin'])
         ->name('observaciones_estancia_constancia_derecho_admin.index')
         ->middleware('auth.admin');
 
 
         //guardar observaciones constancia derecho
         Route::match(['get','post','put'],'/guardar_observaciones_estancia_constancia_derecho_admin/{id}', [documentosEstancia1AdminController::class, 'guardarObservaciones_estancia_constancia_derecho_admin'])
         ->name('guardarObservaciones_estancia_constancia_derecho_admin.index');
 
         //con Observaciones constancia derecho
         Route::match(['post','get'],'/con_Observaciones_estancia_constancia_derecho_admin', [documentosEstancia1AdminController::class, 'conObservaciones_estancia_constancia_derecho_admin'])
         ->name('conObservaciones_estancia_constancia_derecho_admin.index')
         ->middleware('auth.admin');
    //carta responsiva
         //ver con datos carta responsiva
         Route::match(['post','get'],'/ver_cd_estancia_carta_responsiva/admin/{name}', [documentosEstancia1AdminController::class, 'ver_cd_estancia_carta_responsiva_admin'])
         ->name('ver_cd_estancia_carta_responsiva_admin.index')
         ->middleware('auth.admin');
 
         //aceptar  carta responsiva
         Route::match(['post','get','put'],'/aceptar_estancia1_carta_responsiva/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'aceptar_estancia_carta_responsiva_admin'])
         ->name('aceptar_estancia1_carta_responsiva_admin.index');
 
         //pendiente carta responsiva
         Route::match(['post','get','put'],'/pendiente_estancia1_carta_responsiva/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'pendiente_estancia_carta_responsiva_admin'])
         ->name('pendiente_estancia1_carta_responsiva_admin.index');
 
         //observaciones  carta responsiva
         Route::match(['post','get','put'],'/observaciones_estancia_carta_responsiva_admin', [documentosEstancia1AdminController::class, 'observaciones_estancia_carta_responsiva_admin'])
         ->name('observaciones_estancia_carta_responsiva_admin.index')
         ->middleware('auth.admin');
 
 
         //guardar observaciones carta responsiva
         Route::match(['get','post','put'],'/guardar_observaciones_estancia_carta_responsiva_admin/{id}', [documentosEstancia1AdminController::class, 'guardarObservaciones_estancia_carta_responsiva_admin'])
         ->name('guardarObservaciones_estancia_carta_responsiva_admin.index');
 
         //con Observaciones  carta responsiva
         Route::match(['post','get'],'/con_Observaciones_estancia_carta_responsiva_admin', [documentosEstancia1AdminController::class, 'conObservaciones_estancia_carta_responsiva_admin'])
         ->name('conObservaciones_estancia_carta_responsiva_admin.index')
         ->middleware('auth.admin');
    //F01 
        //ver con datos f01
        Route::match(['post','get'],'/ver_cd_estancia_f01/admin/{name}', [documentosEstancia1AdminController::class, 'ver_cd_estancia_f01_admin'])
        ->name('ver_cd_estancia_f01_admin.index')
        ->middleware('auth.admin');

        //aceptar  f01
        Route::match(['post','get','put'],'/aceptar_estancia1_f01/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'aceptar_estancia_f01_admin'])
        ->name('aceptar_estancia1_f01_admin.index');

        //pendiente f01
        Route::match(['post','get','put'],'/pendiente_estancia1_f01/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'pendiente_estancia_f01_admin'])
        ->name('pendiente_estancia1_f01_admin.index');

        //observaciones  f01
        Route::match(['post','get','put'],'/observaciones_estancia_f01_admin', [documentosEstancia1AdminController::class, 'observaciones_estancia_f01_admin'])
        ->name('observaciones_estancia_f01_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f01
        Route::match(['get','post','put'],'/guardar_observaciones_estancia_f01_admin/{id}', [documentosEstancia1AdminController::class, 'guardarObservaciones_estancia_f01_admin'])
        ->name('guardarObservaciones_estancia_f01_admin.index');

        //con Observaciones  f01
        Route::match(['post','get'],'/con_Observaciones_estancia_f01_admin', [documentosEstancia1AdminController::class, 'conObservaciones_estancia_f01_admin'])
        ->name('conObservaciones_estancia_f01_admin.index')
        ->middleware('auth.admin');
    //F02
        //ver con datos f02
        Route::match(['post','get'],'/ver_cd_estancia_f02/admin/{name}', [documentosEstancia1AdminController::class, 'ver_cd_estancia_f02_admin'])
        ->name('ver_cd_estancia_f02_admin.index')
        ->middleware('auth.admin');

        //aceptar  f02
        Route::match(['post','get','put'],'/aceptar_estancia1_f02/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'aceptar_estancia_f02_admin'])
        ->name('aceptar_estancia1_f02_admin.index');

        //pendiente f02
        Route::match(['post','get','put'],'/pendiente_estancia1_f02/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'pendiente_estancia_f02_admin'])
        ->name('pendiente_estancia1_f02_admin.index');

        //observaciones  f02
        Route::match(['post','get','put'],'/observaciones_estancia_f02_admin', [documentosEstancia1AdminController::class, 'observaciones_estancia_f02_admin'])
        ->name('observaciones_estancia_f02_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f02
        Route::match(['get','post','put'],'/guardar_observaciones_estancia_f02_admin/{id}', [documentosEstancia1AdminController::class, 'guardarObservaciones_estancia_f02_admin'])
        ->name('guardarObservaciones_estancia_f02_admin.index');

        //con Observaciones  f02
        Route::match(['post','get'],'/con_Observaciones_estancia_f02_admin', [documentosEstancia1AdminController::class, 'conObservaciones_estancia_f02_admin'])
        ->name('conObservaciones_estancia_f02_admin.index')
        ->middleware('auth.admin');

    //F03
        //ver con datos f03
        Route::match(['post','get'],'/ver_cd_estancia_f03/admin/{name}', [documentosEstancia1AdminController::class, 'ver_cd_estancia_f03_admin'])
        ->name('ver_cd_estancia_f03_admin.index')
        ->middleware('auth.admin');

        //aceptar  f03
        Route::match(['post','get','put'],'/aceptar_estancia1_f03/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'aceptar_estancia_f03_admin'])
        ->name('aceptar_estancia1_f03_admin.index');

        //pendiente f03
        Route::match(['post','get','put'],'/pendiente_estancia1_f03/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'pendiente_estancia_f03_admin'])
        ->name('pendiente_estancia1_f03_admin.index');

        //observaciones  f03
        Route::match(['post','get','put'],'/observaciones_estancia_f03_admin', [documentosEstancia1AdminController::class, 'observaciones_estancia_f03_admin'])
        ->name('observaciones_estancia_f03_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f03
        Route::match(['get','post','put'],'/guardar_observaciones_estancia_f03_admin/{id}', [documentosEstancia1AdminController::class, 'guardarObservaciones_estancia_f03_admin'])
        ->name('guardarObservaciones_estancia_f03_admin.index');
  
        //con Observaciones  f03
        Route::match(['post','get'],'/con_Observaciones_estancia_f03_admin', [documentosEstancia1AdminController::class, 'conObservaciones_estancia_f03_admin'])
        ->name('conObservaciones_estancia_f03_admin.index')
        ->middleware('auth.admin');
    //F04
        //ver con datos f04
        Route::match(['post','get'],'/ver_cd_estancia_f04/admin/{name}', [documentosEstancia1AdminController::class, 'ver_cd_estancia_f04_admin'])
        ->name('ver_cd_estancia_f04_admin.index')
        ->middleware('auth.admin');

        //aceptar  f04
        Route::match(['post','get','put'],'/aceptar_estancia1_f04/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'aceptar_estancia_f04_admin'])
        ->name('aceptar_estancia1_f04_admin.index');

        //pendiente f04
        Route::match(['post','get','put'],'/pendiente_estancia1_f04/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'pendiente_estancia_f04_admin'])
        ->name('pendiente_estancia1_f04_admin.index');

        //observaciones  f04
        Route::match(['post','get','put'],'/observaciones_estancia_f04_admin', [documentosEstancia1AdminController::class, 'observaciones_estancia_f04_admin'])
        ->name('observaciones_estancia_f04_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f04
        Route::match(['get','post','put'],'/guardar_observaciones_estancia_f04_admin/{id}', [documentosEstancia1AdminController::class, 'guardarObservaciones_estancia_f04_admin'])
        ->name('guardarObservaciones_estancia_f04_admin.index');

        //con Observaciones  f04
        Route::match(['post','get'],'/con_Observaciones_estancia_f04_admin', [documentosEstancia1AdminController::class, 'conObservaciones_estancia_f04_admin'])
        ->name('conObservaciones_estancia_f04_admin.index')
        ->middleware('auth.admin');
    //F05
        //ver con datos f05
        Route::match(['post','get'],'/ver_cd_estancia_f05/admin/{name}', [documentosEstancia1AdminController::class, 'ver_cd_estancia_f05_admin'])
        ->name('ver_cd_estancia_f05_admin.index')
        ->middleware('auth.admin');

        //aceptar  f05
        Route::match(['post','get','put'],'/aceptar_estancia1_f05/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'aceptar_estancia_f05_admin'])
        ->name('aceptar_estancia1_f05_admin.index');

        //pendiente f05
        Route::match(['post','get','put'],'/pendiente_estancia1_f05/admin/{idU}/{id}/{name}', [documentosEstancia1AdminController::class, 'pendiente_estancia_f05_admin'])
        ->name('pendiente_estancia1_f05_admin.index');

        //observaciones  f05
        Route::match(['post','get','put'],'/observaciones_estancia_f05_admin', [documentosEstancia1AdminController::class, 'observaciones_estancia_f05_admin'])
        ->name('observaciones_estancia_f05_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f05
        Route::match(['get','post','put'],'/guardar_observaciones_estancia_f05_admin/{id}', [documentosEstancia1AdminController::class, 'guardarObservaciones_estancia_f05_admin'])
        ->name('guardarObservaciones_estancia_f05_admin.index');

        //con Observaciones  f05
        Route::match(['post','get'],'/con_Observaciones_estancia_f05_admin', [documentosEstancia1AdminController::class, 'conObservaciones_estancia_f05_admin'])
        ->name('conObservaciones_estancia_f05_admin.index')
        ->middleware('auth.admin');

        //buscardor
        Route::get('/Buscar', [documentosEstancia1AdminController::class, 'buscador_estancia1'])
        ->name('Buscar_estancia1.index')
        ->middleware('auth.admin');


        //buscardor
        Route::get('/Buscar_datos_c', [documentosEstancia1AdminController::class, 'buscador_estancia1_c'])
        ->name('Buscar_estancia1_c.index')
        ->middleware('auth.admin');

//estancia 2
 Route::match(['post','get'],'/estancia2_Documentos', [documentosEstancia2AdminController::class, 'ver'])
 ->name('documentoEstancia2Admin.index')
 ->middleware('auth.admin');
 //Carga horaria
     //ver con datos carga_horaria
     Route::match(['post','get'],'/ver_cd_estancia_carga_horaria/admin/{name}', [documentosEstancia2AdminController::class, 'ver_cd_estancia_carga_horaria_admin'])
     ->name('ver_cd_estancia_carga_horaria_admin.index')
     ->middleware('auth.admin');

     //aceptar carga horaria
     Route::match(['post','get','put'],'/aceptar_estancia_carga_horaria/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'aceptar_estancia_carga_horaria_admin'])
     ->name('aceptar_estancia2_carga_horaria_admin.index');

     //pendiente constancia derecho
     Route::match(['post','get','put'],'/pendiente_estancia_carga_horaria/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'pendiente_estancia_carga_horaria_admin'])
     ->name('pendiente_estancia2_carga_horaria_admin.index');

     //observaciones  constancia derecho
     Route::match(['post','get','put'],'/observaciones_estancia_carga_horaria_admin', [documentosEstancia2AdminController::class, 'observaciones_estancia_carga_horaria_admin'])
     ->name('observaciones_estancia_carga_horaria_admin.index')
     ->middleware('auth.admin');

     //guardar observaciones constancia derecho
     Route::match(['get','post','put'],'/guardar_observaciones_estancia_carga_horaria_admin/{id}', [documentosEstancia2AdminController::class, 'guardarObservaciones_estancia_carga_horaria_admin'])
     ->name('guardarObservaciones_estancia_carga_horaria_admin.index');

     //con Observaciones constancia derecho
     Route::match(['post','get'],'/con_Observaciones_estancia_carga_horaria_admin', [documentosEstancia2AdminController::class, 'conObservaciones_estancia_carga_horaria_admin'])
     ->name('conObservaciones_estancia_carga_horaria_admin.index')
     ->middleware('auth.admin');
 //constancia derecho
     //ver con datos constancia derecho
     Route::match(['post','get'],'/ver_cd_estancia_constancia_derecho/admin/{name}', [documentosEstancia2AdminController::class, 'ver_cd_estancia_constancia_derecho_admin'])
     ->name('ver_cd_estancia_constancia_derecho_admin.index')
     ->middleware('auth.admin');

     //aceptar  constancia derecho
     Route::match(['post','get','put'],'/aceptar_estancia_constancia_derecho/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'aceptar_estancia_constancia_derecho_admin'])
     ->name('aceptar_estancia2_constancia_derecho_admin.index');

     //pendiente constancia derecho
     Route::match(['post','get','put'],'/pendiente_estancia_constancia_derecho/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'pendiente_estancia_constancia_derecho_admin'])
     ->name('pendiente_estancia2_constancia_derecho_admin.index');

     //observaciones  constancia derecho
     Route::match(['post','get','put'],'/observaciones_estancia_constancia_derecho_admin', [documentosEstancia2AdminController::class, 'observaciones_estancia_constancia_derecho_admin'])
     ->name('observaciones_estancia_constancia_derecho_admin.index')
     ->middleware('auth.admin');


     //guardar observaciones constancia derecho
     Route::match(['get','post','put'],'/guardar_observaciones_estancia_constancia_derecho_admin/{id}', [documentosEstancia2AdminController::class, 'guardarObservaciones_estancia_constancia_derecho_admin'])
     ->name('guardarObservaciones_estancia_constancia_derecho_admin.index');

     //con Observaciones constancia derecho
     Route::match(['post','get'],'/con_Observaciones_estancia_constancia_derecho_admin', [documentosEstancia2AdminController::class, 'conObservaciones_estancia_constancia_derecho_admin'])
     ->name('conObservaciones_estancia_constancia_derecho_admin.index')
     ->middleware('auth.admin');
 //carta responsiva
     //ver con datos carta responsiva
     Route::match(['post','get'],'/ver_cd_estancia_carta_responsiva/admin/{name}', [documentosEstancia2AdminController::class, 'ver_cd_estancia_carta_responsiva_admin'])
     ->name('ver_cd_estancia_carta_responsiva_admin.index')
     ->middleware('auth.admin');

     //aceptar  carta responsiva
     Route::match(['post','get','put'],'/aceptar_estancia_carta_responsiva/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'aceptar_estancia_carta_responsiva_admin'])
     ->name('aceptar_estancia2_carta_responsiva_admin.index');

     //pendiente carta responsiva
     Route::match(['post','get','put'],'/pendiente_estancia_carta_responsiva/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'pendiente_estancia_carta_responsiva_admin'])
     ->name('pendiente_estancia2_carta_responsiva_admin.index');

     //observaciones  carta responsiva
     Route::match(['post','get','put'],'/observaciones_estancia_carta_responsiva_admin', [documentosEstancia2AdminController::class, 'observaciones_estancia_carta_responsiva_admin'])
     ->name('observaciones_estancia_carta_responsiva_admin.index')
     ->middleware('auth.admin');


     //guardar observaciones carta responsiva
     Route::match(['get','post','put'],'/guardar_observaciones_estancia_carta_responsiva_admin/{id}', [documentosEstancia2AdminController::class, 'guardarObservaciones_estancia_carta_responsiva_admin'])
     ->name('guardarObservaciones_estancia_carta_responsiva_admin.index');

     //con Observaciones  carta responsiva
     Route::match(['post','get'],'/con_Observaciones_estancia_carta_responsiva_admin', [documentosEstancia2AdminController::class, 'conObservaciones_estancia_carta_responsiva_admin'])
     ->name('conObservaciones_estancia_carta_responsiva_admin.index')
     ->middleware('auth.admin');
 //F01 
    //ver con datos f01
    Route::match(['post','get'],'/ver_cd_estancia_f01/admin/{name}', [documentosEstancia2AdminController::class, 'ver_cd_estancia_f01_admin'])
    ->name('ver_cd_estancia_f01_admin.index')
    ->middleware('auth.admin');

    //aceptar  f01
    Route::match(['post','get','put'],'/aceptar_estancia_f01/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'aceptar_estancia_f01_admin'])
    ->name('aceptar_estancia2_f01_admin.index');

    //pendiente f01
    Route::match(['post','get','put'],'/pendiente_estancia_f01/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'pendiente_estancia_f01_admin'])
    ->name('pendiente_estancia2_f01_admin.index');

    //observaciones  f01
    Route::match(['post','get','put'],'/observaciones_estancia_f01_admin', [documentosEstancia2AdminController::class, 'observaciones_estancia_f01_admin'])
    ->name('observaciones_estancia_f01_admin.index')
    ->middleware('auth.admin');


    //guardar observaciones f01
    Route::match(['get','post','put'],'/guardar_observaciones_estancia_f01_admin/{id}', [documentosEstancia2AdminController::class, 'guardarObservaciones_estancia_f01_admin'])
    ->name('guardarObservaciones_estancia_f01_admin.index');

    //con Observaciones  f01
    Route::match(['post','get'],'/con_Observaciones_estancia_f01_admin', [documentosEstancia2AdminController::class, 'conObservaciones_estancia_f01_admin'])
    ->name('conObservaciones_estancia_f01_admin.index')
    ->middleware('auth.admin');
 //F02
    //ver con datos f02
    Route::match(['post','get'],'/ver_cd_estancia_f02/admin/{name}', [documentosEstancia2AdminController::class, 'ver_cd_estancia_f02_admin'])
    ->name('ver_cd_estancia_f02_admin.index')
    ->middleware('auth.admin');

    //aceptar  f02
    Route::match(['post','get','put'],'/aceptar_estancia_f02/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'aceptar_estancia_f02_admin'])
    ->name('aceptar_estancia2_f02_admin.index');

    //pendiente f02
    Route::match(['post','get','put'],'/pendiente_estancia_f02/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'pendiente_estancia_f02_admin'])
    ->name('pendiente_estancia2_f02_admin.index');

    //observaciones  f02
    Route::match(['post','get','put'],'/observaciones_estancia_f02_admin', [documentosEstancia2AdminController::class, 'observaciones_estancia_f02_admin'])
    ->name('observaciones_estancia_f02_admin.index')
    ->middleware('auth.admin');


    //guardar observaciones f02
    Route::match(['get','post','put'],'/guardar_observaciones_estancia_f02_admin/{id}', [documentosEstancia2AdminController::class, 'guardarObservaciones_estancia_f02_admin'])
    ->name('guardarObservaciones_estancia_f02_admin.index');

    //con Observaciones  f02
    Route::match(['post','get'],'/con_Observaciones_estancia_f02_admin', [documentosEstancia2AdminController::class, 'conObservaciones_estancia_f02_admin'])
    ->name('conObservaciones_estancia_f02_admin.index')
    ->middleware('auth.admin');

 //F03
    //ver con datos f03
    Route::match(['post','get'],'/ver_cd_estancia_f03/admin/{name}', [documentosEstancia2AdminController::class, 'ver_cd_estancia_f03_admin'])
    ->name('ver_cd_estancia_f03_admin.index')
    ->middleware('auth.admin');

    //aceptar  f03
    Route::match(['post','get','put'],'/aceptar_estancia_f03/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'aceptar_estancia_f03_admin'])
    ->name('aceptar_estancia2_f03_admin.index');

    //pendiente f03
    Route::match(['post','get','put'],'/pendiente_estancia_f03/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'pendiente_estancia_f03_admin'])
    ->name('pendiente_estancia2_f03_admin.index');

    //observaciones  f03
    Route::match(['post','get','put'],'/observaciones_estancia_f03_admin', [documentosEstancia2AdminController::class, 'observaciones_estancia_f03_admin'])
    ->name('observaciones_estancia_f03_admin.index')
    ->middleware('auth.admin');


    //guardar observaciones f03
    Route::match(['get','post','put'],'/guardar_observaciones_estancia_f03_admin/{id}', [documentosEstancia2AdminController::class, 'guardarObservaciones_estancia_f03_admin'])
    ->name('guardarObservaciones_estancia_f03_admin.index');

    //con Observaciones  f03
    Route::match(['post','get'],'/con_Observaciones_estancia_f03_admin', [documentosEstancia2AdminController::class, 'conObservaciones_estancia_f03_admin'])
    ->name('conObservaciones_estancia_f03_admin.index')
    ->middleware('auth.admin');
 //F04
    //ver con datos f04
    Route::match(['post','get'],'/ver_cd_estancia_f04/admin/{name}', [documentosEstancia2AdminController::class, 'ver_cd_estancia_f04_admin'])
    ->name('ver_cd_estancia_f04_admin.index')
    ->middleware('auth.admin');

    //aceptar  f04
    Route::match(['post','get','put'],'/aceptar_estancia_f04/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'aceptar_estancia_f04_admin'])
    ->name('aceptar_estancia2_f04_admin.index');

    //pendiente f04
    Route::match(['post','get','put'],'/pendiente_estancia_f04/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'pendiente_estancia_f04_admin'])
    ->name('pendiente_estancia2_f04_admin.index');

    //observaciones  f04
    Route::match(['post','get','put'],'/observaciones_estancia_f04_admin', [documentosEstancia2AdminController::class, 'observaciones_estancia_f04_admin'])
    ->name('observaciones_estancia_f04_admin.index')
    ->middleware('auth.admin');


    //guardar observaciones f04
    Route::match(['get','post','put'],'/guardar_observaciones_estancia_f04_admin/{id}', [documentosEstancia2AdminController::class, 'guardarObservaciones_estancia_f04_admin'])
    ->name('guardarObservaciones_estancia_f04_admin.index');

    //con Observaciones  f04
    Route::match(['post','get'],'/con_Observaciones_estancia_f04_admin', [documentosEstancia2AdminController::class, 'conObservaciones_estancia_f04_admin'])
    ->name('conObservaciones_estancia_f04_admin.index')
    ->middleware('auth.admin');
 //F05
    //ver con datos f05
    Route::match(['post','get'],'/ver_cd_estancia_f05/admin/{name}', [documentosEstancia2AdminController::class, 'ver_cd_estancia_f05_admin'])
    ->name('ver_cd_estancia_f05_admin.index')
    ->middleware('auth.admin');

    //aceptar  f05
    Route::match(['post','get','put'],'/aceptar_estancia_f05/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'aceptar_estancia_f05_admin'])
    ->name('aceptar_estancia2_f05_admin.index');

    //pendiente f05
    Route::match(['post','get','put'],'/pendiente_estancia_f05/admin/{idU}/{id}/{name}', [documentosEstancia2AdminController::class, 'pendiente_estancia_f05_admin'])
    ->name('pendiente_estancia2_f05_admin.index');

    //observaciones  f05
    Route::match(['post','get','put'],'/observaciones_estancia_f05_admin', [documentosEstancia2AdminController::class, 'observaciones_estancia_f05_admin'])
    ->name('observaciones_estancia_f05_admin.index')
    ->middleware('auth.admin');


    //guardar observaciones f05
    Route::match(['get','post','put'],'/guardar_observaciones_estancia_f05_admin/{id}', [documentosEstancia2AdminController::class, 'guardarObservaciones_estancia_f05_admin'])
    ->name('guardarObservaciones_estancia_f05_admin.index');

    //con Observaciones  f05
    Route::match(['post','get'],'/con_Observaciones_estancia_f05_admin', [documentosEstancia2AdminController::class, 'conObservaciones_estancia_f05_admin'])
    ->name('conObservaciones_estancia_f05_admin.index')
    ->middleware('auth.admin');

    //buscardor
    Route::get('/buscar', [documentosEstancia2AdminController::class, 'buscador_estancia'])
    ->name('buscar_estancia2.index')
    ->middleware('auth.admin');


    //buscardor
    Route::get('/buscar_datos_c', [documentosEstancia2AdminController::class, 'buscador_estancia_c'])
    ->name('buscar_estancia2_c.index')
    ->middleware('auth.admin');

//estadias
    Route::match(['post','get'],'/estadia_Documentos', [documentosEstadiaAdminController::class, 'ver'])
    ->name('documentoEstadiaAdmin.index')
    ->middleware('auth.admin');
    //carga horaria
         //ver con datos carga horaria
         Route::match(['post','get'],'/ver_cd_estadia_carga_horaria/admin/{name}', [documentosEstadiaAdminController::class, 'ver_cd_estadia_carga_horaria_admin'])
         ->name('ver_cd_estadia_carga_horaria_admin.index')
         ->middleware('auth.admin');
 
         //aceptar  carga horaria
         Route::match(['post','get','put'],'/aceptar_estadia_carga_horaria/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'aceptar_estadia_carga_horaria_admin'])
         ->name('aceptar_estadia_carga_horaria_admin.index');
 
         //pendiente carga horaria
         Route::match(['post','get','put'],'/pendiente_estadia_carga_horaria/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'pendiente_estadia_carga_horaria_admin'])
         ->name('pendiente_estadia_carga_horaria_admin.index');
 
         //observaciones  carga horaria
         Route::match(['post','get','put'],'/observaciones_estadia_carga_horaria_admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_carga_horaria_admin'])
         ->name('observaciones_estadia_carga_horaria_admin.index')
         ->middleware('auth.admin');
 
 
         //guardar observaciones carga horaria
         Route::match(['get','post','put'],'/guardar_observaciones_estadia_carga_horaria_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_carga_horaria_admin'])
         ->name('guardarObservaciones_estadia_carga_horaria_admin.index');
 
         //con Observaciones  carga horaria
         Route::match(['post','get'],'/con_Observaciones_estadia_carga_horaria_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_carga_horaria_admin'])
         ->name('conObservaciones_estadia_carga_horaria_admin.index')
         ->middleware('auth.admin');
    //constancia derecho
         //ver con datos constancia derecho
         Route::match(['post','get'],'/ver_cd_estadia_constancia_derecho/admin/{name}', [documentosEstadiaAdminController::class, 'ver_cd_estadia_constancia_derecho_admin'])
         ->name('ver_cd_estadia_constancia_derecho_admin.index')
         ->middleware('auth.admin');
 
         //aceptar constancia derecho
         Route::match(['post','get','put'],'/aceptar_estadia_constancia_derecho/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'aceptar_estadia_constancia_derecho_admin'])
         ->name('aceptar_estadia_constancia_derecho_admin.index');
 
         //pendiente constancia derecho
         Route::match(['post','get','put'],'/pendiente_estadia_constancia_derecho/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'pendiente_estadia_constancia_derecho_admin'])
         ->name('pendiente_estadia_constancia_derecho_admin.index');
 
         //observaciones  constancia derecho
         Route::match(['post','get','put'],'/observaciones_estadia_constancia_derecho_admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_constancia_derecho_admin'])
         ->name('observaciones_estadia_constancia_derecho_admin.index')
         ->middleware('auth.admin');
 
 
         //guardar observaciones constancia derecho
         Route::match(['get','post','put'],'/guardar_observaciones_estadia_constancia_derecho_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_constancia_derecho_admin'])
         ->name('guardarObservaciones_estadia_constancia_derecho_admin.index');
 
         //con Observaciones  constancia derecho
         Route::match(['post','get'],'/con_Observaciones_estadia_constancia_derecho_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_constancia_derecho_admin'])
         ->name('conObservaciones_estadia_constancia_derecho_admin.index')
         ->middleware('auth.admin');
    //carta responsiva
         //ver con datos carta responsiva
         Route::match(['post','get'],'/ver_cd_estadia_carta_responsiva/admin/{name}', [documentosEstadiaAdminController::class, 'ver_cd_estadia_carta_responsiva_admin'])
         ->name('ver_cd_estadia_carta_responsiva_admin.index')
         ->middleware('auth.admin');
 
         //aceptar  carta responsiva
         Route::match(['post','get','put'],'/aceptar_estadia_carta_responsiva/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'aceptar_estadia_carta_responsiva_admin'])
         ->name('aceptar_estadia_carta_responsiva_admin.index');
 
         //pendiente carta responsiva
         Route::match(['post','get','put'],'/pendiente_estadia_carta_responsiva/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'pendiente_estadia_carta_responsiva_admin'])
         ->name('pendiente_estadia_carta_responsiva_admin.index');
 
         //observaciones  carta responsiva
         Route::match(['post','get','put'],'/observaciones_estadia_carta_responsiva_admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_carta_responsiva_admin'])
         ->name('observaciones_estadia_carta_responsiva_admin.index')
         ->middleware('auth.admin');
 
 
         //guardar observaciones carta responsiva
         Route::match(['get','post','put'],'/guardar_observaciones_estadia_carta_responsiva_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_carta_responsiva_admin'])
         ->name('guardarObservaciones_estadia_carta_responsiva_admin.index');
 
         //con Observaciones  carta responsiva
         Route::match(['post','get'],'/con_Observaciones_estadia_carta_responsiva_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_carta_responsiva_admin'])
         ->name('conObservaciones_estadia_carta_responsiva_admin.index')
         ->middleware('auth.admin');
    //f01
        //ver con datos f01
        Route::match(['post','get'],'/ver_cd_estadia_f01/admin/{name}', [documentosEstadiaAdminController::class, 'ver_cd_estadia_f01_admin'])
        ->name('ver_cd_estadia_f01_admin.index')
        ->middleware('auth.admin');

        //aceptar  f01
        Route::match(['post','get','put'],'/aceptar_estadia_f01/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'aceptar_estadia_f01_admin'])
        ->name('aceptar_estadia_f01_admin.index');

        //pendiente f01
        Route::match(['post','get','put'],'/pendiente_estadia_f01/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'pendiente_estadia_f01_admin'])
        ->name('pendiente_estadia_f01_admin.index');

        //observaciones  f01
        Route::match(['post','get','put'],'/observaciones_estadia_f01_admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_f01_admin'])
        ->name('observaciones_estadia_f01_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f01
        Route::match(['get','post','put'],'/guardar_observaciones_estadia_f01_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_f01_admin'])
        ->name('guardarObservaciones_estadia_f01_admin.index');

        //con Observaciones  f01
        Route::match(['post','get'],'/con_Observaciones_estadia_f01_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_f01_admin'])
        ->name('conObservaciones_estadia_f01_admin.index')
        ->middleware('auth.admin');

    //f02
        //ver con datos f02
        Route::match(['post','get'],'/ver_cd_estadia_f02/admin/{name}', [documentosEstadiaAdminController::class, 'ver_cd_estadia_f02_admin'])
        ->name('ver_cd_estadia_f02_admin.index')
        ->middleware('auth.admin');

        //aceptar  f02
        Route::match(['post','get','put'],'/aceptar_estadia_f02/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'aceptar_estadia_f02_admin'])
        ->name('aceptar_estadia_f02_admin.index');

        //pendiente f02
        Route::match(['post','get','put'],'/pendiente_estadia_f02/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'pendiente_estadia_f02_admin'])
        ->name('pendiente_estadia_f02_admin.index');

        //observaciones  f02
        Route::match(['post','get','put'],'/observaciones_estadia_f02_admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_f02_admin'])
        ->name('observaciones_estadia_f02_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f02
        Route::match(['get','post','put'],'/guardar_observaciones_estadia_f02_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_f02_admin'])
        ->name('guardarObservaciones_estadia_f02_admin.index');

        //con Observaciones  f02
        Route::match(['post','get'],'/con_Observaciones_estadia_f02_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_f02_admin'])
        ->name('conObservaciones_estadia_f02_admin.index')
        ->middleware('auth.admin');

    //f03
        //ver con datos f03
        Route::match(['post','get'],'/ver_cd_estadia_f03/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'ver_cd_estadia_f03_admin'])
        ->name('ver_cd_estadia_f03_admin.index')
        ->middleware('auth.admin');

        //aceptar  f03
        Route::match(['post','get','put'],'/aceptar_estadia_f03/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'aceptar_estadia_f03_admin'])
        ->name('aceptar_estadia_f03_admin.index');

        //pendiente f03
        Route::match(['post','get','put'],'/pendiente_estadia_f03/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'pendiente_estadia_f03_admin'])
        ->name('pendiente_estadia_f03_admin.index');

        //observaciones  f03
        Route::match(['post','get','put'],'/observaciones_estadia_f03_admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_f03_admin'])
        ->name('observaciones_estadia_f03_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f03
        Route::match(['get','post','put'],'/guardar_observaciones_estadia_f03_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_f03_admin'])
        ->name('guardarObservaciones_estadia_f03_admin.index');
  
        //con Observaciones  f03
        Route::match(['post','get'],'/con_Observaciones_estadia_f03_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_f03_admin'])
        ->name('conObservaciones_estadia_f03_admin.index')
        ->middleware('auth.admin');
        
    //f04
        //ver con datos f04
        Route::match(['post','get'],'/ver_cd_estadia_f04/admin/{name}', [documentosEstadiaAdminController::class, 'ver_cd_estadia_f04_admin'])
        ->name('ver_cd_estadia_f04_admin.index')
        ->middleware('auth.admin');

        //aceptar  f04
        Route::match(['post','get','put'],'/aceptar_estadia_f04/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'aceptar_estadia_f04_admin'])
        ->name('aceptar_estadia_f04_admin.index');

        //pendiente f04
        Route::match(['post','get','put'],'/pendiente_estadia_f04/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'pendiente_estadia_f04_admin'])
        ->name('pendiente_estadia_f04_admin.index');

        //observaciones  f04
        Route::match(['post','get','put'],'/observaciones_estadia_f04_admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_f04_admin'])
        ->name('observaciones_estadia_f04_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f04
        Route::match(['get','post','put'],'/guardar_observaciones_estadia_f04_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_f04_admin'])
        ->name('guardarObservaciones_estadia_f04_admin.index');

        //con Observaciones  f04
        Route::match(['post','get'],'/con_Observaciones_estadia_f04_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_f04_admin'])
        ->name('conObservaciones_estadia_f04_admin.index')
        ->middleware('auth.admin');

    //f05
        //ver con datos f05
        Route::match(['post','get'],'/ver_cd_estadia_f05/admin/{name}', [documentosEstadiaAdminController::class, 'ver_cd_estadia_f05_admin'])
        ->name('ver_cd_estadia_f05_admin.index')
        ->middleware('auth.admin');

        //aceptar  f05
        Route::match(['post','get','put'],'/aceptar_estadia_f05/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'aceptar_estadia_f05_admin'])
        ->name('aceptar_estadia_f05_admin.index');

        //pendiente f05
        Route::match(['post','get','put'],'/pendiente_estadia_f05/admin/{idU}/{id}/{name}', [documentosEstadiaAdminController::class, 'pendiente_estadia_f05_admin'])
        ->name('pendiente_estadia_f05_admin.index');

        //observaciones  f05
        Route::match(['post','get','put'],'/observaciones_estadia_f05_admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_f05_admin'])
        ->name('observaciones_estadia_f05_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f05
        Route::match(['get','post','put'],'/guardar_observaciones_estadia_f05_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_f05_admin'])
        ->name('guardarObservaciones_estadia_f05_admin.index');

        //con Observaciones  f05
        Route::match(['post','get'],'/con_Observaciones_estadia_f05_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_f05_admin'])
        ->name('conObservaciones_estadia_f05_admin.index')
        ->middleware('auth.admin');


        //buscardor
        Route::get('/nombres', [documentosEstadiaAdminController::class, 'buscador'])
        ->name('nombres.index');;
        //buscardor
        Route::get('/buscar_datos_estadia', [documentosEstadiaAdminController::class, 'buscador_c'])
        ->name('buscar_estadia.index');;
//-----------estadia nacional
    Route::match(['post','get'],'/estadia_nacional_Documentos', [documentosEstadiaNacionalAdminController::class, 'ver'])
    ->name('documentoEstadiaNacionalAdmin.index')
    ->middleware('auth.admin');

//-----------servicio social
    Route::match(['post','get'],'/servicio_social_Documentos', [documentosServicioSocialAdminController::class, 'ver'])
    ->name('documentoServicioSocialAdmin.index')
    ->middleware('auth.admin');


//alumno
   

    //inicio
    Route::get('/inicio', [InicioController::class, 'ver'])
    ->name('inicio.index')
    ->middleware('auth');

    //editar contra vista
    Route::get('/alumno_ver_editar', [LoginController::class, 'ver'])
    ->middleware('auth')
    ->name('alumno_ver_editar.index');

    //editar contra
    Route::match(['post','get','put'],'/alumno_editar', [LoginController::class, 'editar'])
    ->middleware('auth')
    ->name('alumno_editar.index');

    //reiniciar USUARIO
    Route::match(['post','get','put'],'/reiniciar_{id}', [InicioController::class, 'reiniciarU'])
    ->name('reiniciarU.index')
    ->middleware('auth');


//formato estancias 1
    Route::match(['post','get'],'/estancia1', [Estancia1Controller::class, 'ver'])
    ->name('estancia1.index')
    ->middleware('auth');

    //enviar documento carga horaria con datos
    Route::match(['post', 'delete','put'],'actualizar/carga_horaria/{name}/{nombre}', [Estancia1Controller::class, 'actualizar_carga_horaria_estancia'])
    ->name('actualizar_carga_horaria_estancia.index');

    //enviar documento carga horaria sin datos 
    Route::match(['post', 'delete','put','get'],'subir/carga_horaria/{name}/{nombre}', [Estancia1Controller::class, 'subir_carga_horaria_estancia'])
    ->name('subir_carga_horaria_estancia.index');

    //cancelar solicitud documento carga horaria
    Route::match(['post', 'delete','put'], '/carga_horaria/{id_d}/{nombre}',[PdfController::class,'cancelar_carga_horaria_Estancia'])
    ->name('cancelar_carga_horaria_Estancia.index');

    //enviar documento constancia derecho con datos
    Route::match(['post', 'delete','put'],'actualizar/constancia_derecho/{name}/{nombre}', [Estancia1Controller::class, 'actualizar_constancia_derecho_estancia'])
    ->name('actualizar_constancia_derecho_estancia.index');

    //enviar documento constancia derecho sin datos 
    Route::match(['post', 'delete','put','get'],'subir/constancia_derecho/{name}/{nombre}', [Estancia1Controller::class, 'subir_constancia_derecho_estancia'])
    ->name('subir_constancia_derecho_estancia.index');

    //cancelar solicitud documento constancia derecho
    Route::match(['post', 'delete','put'], '/constancia_derecho/{id_d}/{nombre}',[PdfController::class,'cancelar_constancia_derecho_Estancia'])
    ->name('cancelar_constancia_derecho_Estancia.index');
    
    //enviar documento carta responsiva con datos
    Route::match(['post', 'delete','put'],'actualizar/carta_responsiva/{name}/{nombre}', [Estancia1Controller::class, 'actualizar_carta_responsiva_estancia'])
    ->name('actualizar_carta_responsiva_estancia.index');

    //enviar documento carta responsiva sin datos 
    Route::match(['post', 'delete','put','get'],'subir/carta_responsiva/{name}/{nombre}', [Estancia1Controller::class, 'subir_carta_responsiva_estancia'])
    ->name('subir_carta_responsiva_estancia.index');

    //cancelar solicitud documento carta responsiva
    Route::match(['post', 'delete','put'], '/carta_responsiva/{id_d}/{nombre}',[PdfController::class,'cancelar_carta_responsiva_Estancia'])
    ->name('cancelar_carta_responsiva_Estancia.index');

    //descargar con datos f01
    Route::get('/descarga_cd_estancia_f01', [PdfController::class, 'descarga_cd_f01_estancia'])
    ->name('descarga_cd_estancia_f01.index');

     //enviar documento f01 con datos
     Route::match(['post', 'delete','put'],'actualizar/f01/{name}/{nombre}', [Estancia1Controller::class, 'actualizarF01_estancia'])
     ->name('actualizar_f01_estancia.index');
 
     //enviar documento f01 sin datos 
     Route::match(['post', 'delete','put','get'],'subir/f01/{name}/{nombre}', [Estancia1Controller::class, 'subirF01_estancia'])
     ->name('subir_f01_estancia.index');
 
     //cancelar solicitud documento f01
     Route::match(['post', 'delete','put'], '/f01/{id_d}/{nombre}',[PdfController::class,'cancelarF01_Estancia'])
     ->name('cancelar_f01_Estancia.index');

    //descargar con datos f02
    Route::get('/descarga_cd_estancia_f02', [PdfController::class, 'descarga_cd_f02_estancia'])
    ->name('descarga_cd_estancia_f02.index');

    //enviar documento f02 con datos
    Route::match(['post', 'delete','put'],'actualizar/f02/{name}/{nombre}', [Estancia1Controller::class, 'actualizarF02_estancia'])
    ->name('actualizar_f02_estancia.index');

    //enviar documento f02 sin datos 
    Route::match(['post', 'delete','put','get'],'subir/f02/{name}/{nombre}', [Estancia1Controller::class, 'subirF02_estancia'])
    ->name('subir_f02_estancia.index');

    //cancelar solicitud documento f02
    Route::match(['post', 'delete','put'], '/f02/{id_d}/{nombre}',[PdfController::class,'cancelarF02_Estancia'])
    ->name('cancelar_f02_Estancia.index');

    //llenar f03
    Route::get('/home', [CedulaController::class, 'ver'])
    ->name('home.index')
    ->middleware('auth');
    
    Route::post('/home', [CedulaController::class, 'store'])
        ->name('home.store');
    
    
    //descargar sin datos f03
    Route::get('/descarga_sd_estancia_f03', [DescargaController::class, 'descarga_sd_estancia_f03'])
    ->name('descarga_sd_estancia_f03.index');

    //descargar con datos f03
    Route::get('/descarga_cd_estancia_f03', [PdfController::class, 'descarga_cd_estancia_f03'])
    ->name('descarga_cd_estancia_f03.index');

    //eliminar f03 estancia
    Route::match(['post', 'delete','put','get'],'/f03Estancia/{id_a}/{id_e}/{id_a_e}/{id_a_a}/{id_p}',[PdfController::class,'eliminarF03Estancia'])
    ->name('eliminar_f03');

    //enviar documento f03 con datos
    Route::match(['post', 'delete','put'],'actualizar/f03/{name}/{nombre}', [Estancia1Controller::class, 'actualizarF03_estancia'])
    ->name('actualizar_f03_estancia.index');

    //enviar documento f03 sin datos 
    Route::match(['post', 'delete','put','get'],'subir/f03/{name}/{nombre}', [Estancia1Controller::class, 'subirF03_estancia'])
    ->name('subir_f03_estancia.index');

    //cancelar solicitud documento f03
    Route::match(['post', 'delete','put'], '/f03/{id_d}/{nombre}',[PdfController::class,'cancelarF03_Estancia'])
    ->name('cancelar_f03_Estancia.index');
    

    //llenar datos f04
    Route::get('/usuario_estancia/f04-definicion_de_proyecto', [definicionController::class, 'ver'])
    ->name('f04Formulario.index')
    ->middleware('auth');


    //guardar f04
    Route::post('/usuario/f04-definicion_de_proyecto', [definicion_proyectoController::class, 'store'])
    ->name('f04Guardar.index');

    //eliminar f04
    Route::match(['post', 'delete','put','get'],'/f04/{id_a}/{id_a_e}/{id_p}/{id_d}',[PdfController::class,'eliminarF04'])
    ->name('eliminar_f04.index');

    //descargar f04 con datos
    Route::get('/descarga_cd_estacia_f04', [PdfController::class, 'descarga_cd_estancia_f04'])
    ->name('descarga_cd_estancia_f04.index');

    //enviar documento f04 con datos
    Route::match(['post', 'delete','put'],'actualizar/f04/{name}/{nombre}', [Estancia1Controller::class, 'actualizarF04_estancia'])
    ->name('actualizar_f04_estancia.index');

    //enviar documento f04 sin datos 
    Route::match(['post', 'delete','put','get'],'subir/f04/{name}/{nombre}', [Estancia1Controller::class, 'subirF04_estancia'])
    ->name('subir_f04_estancia.index');

    //cancelar solicitud documento f04
    Route::match(['post', 'delete','put'], '/f04_estancia/{id_d}/{nombre}',[PdfController::class,'cancelarF04_Estancia'])
    ->name('cancelar_f04_Estancia.index');

    //descargar f05 con datos
    Route::get('/descarga_cd_estacia_f05', [PdfController::class, 'descarga_cd_estancia_f05'])
    ->name('descarga_cd_estancia_f05.index');

    //enviar documento f05 con datos
    Route::match(['post', 'delete','put'],'actualizar/f05/{name}/{nombre}', [Estancia1Controller::class, 'actualizarF05_estancia'])
    ->name('actualizar_f05_estancia.index');
   
    //enviar documento f05 sin datos 
    Route::match(['post', 'delete','put','get'],'subir/f05/{name}/{nombre}', [Estancia1Controller::class, 'subirF05_estancia'])
    ->name('subir_f05_estancia.index');

    //cancelar solicitud documento f05
    Route::match(['post', 'delete','put'], '/f05/{id_d}/{nombre}',[PdfController::class,'cancelarF05_Estancia'])
    ->name('cancelar_f05_Estancia.index');

    //reporte evaluacion
    //Descarga
    Route::match(['post', 'delete','put','get'],'descarga/reporte_evaluaciona_estancia', [DescargaController::class, 'descarga_reporte_estancia'])
    ->name('descarga_reporte_evaluacion_estancia.index');


    //Descarga
    Route::match(['post', 'delete','put','get'],'descarga/carta_responsiva_estancia', [DescargaController::class, 'descarga_carta_responsiva'])
    ->name('descarga_carta_responsiva.index');

//formato estancias 2
 Route::match(['post','get'],'/estancia2', [Estancia2Controller::class, 'ver'])
 ->name('estancia2.index')
 ->middleware('auth');

 //enviar documento carga horaria con datos
 Route::match(['post', 'delete','put'],'actualizar/carga_horaria/{name}/{nombre}', [Estancia2Controller::class, 'actualizar_carga_horaria_estancia'])
 ->name('actualizar_carga_horaria_estancia.index');

 //enviar documento carga horaria sin datos 
 Route::match(['post', 'delete','put','get'],'subir/carga_horaria/{name}/{nombre}', [Estancia2Controller::class, 'subir_carga_horaria_estancia'])
 ->name('subir_carga_horaria_estancia.index');

 //cancelar solicitud documento carga horaria
 Route::match(['post', 'delete','put'], '/carga_horaria/{id_d}/{nombre}',[PdfController::class,'cancelar_carga_horaria_Estancia'])
 ->name('cancelar_carga_horaria_Estancia.index');

 //enviar documento constancia derecho con datos
 Route::match(['post', 'delete','put'],'actualizar/constancia_derecho/{name}/{nombre}', [Estancia2Controller::class, 'actualizar_constancia_derecho_estancia'])
 ->name('actualizar_constancia_derecho_estancia.index');

 //enviar documento constancia derecho sin datos 
 Route::match(['post', 'delete','put','get'],'subir/constancia_derecho/{name}/{nombre}', [Estancia2Controller::class, 'subir_constancia_derecho_estancia'])
 ->name('subir_constancia_derecho_estancia.index');

 //cancelar solicitud documento constancia derecho
 Route::match(['post', 'delete','put'], '/constancia_derecho/{id_d}/{nombre}',[PdfController::class,'cancelar_constancia_derecho_Estancia'])
 ->name('cancelar_constancia_derecho_Estancia.index');

 //enviar documento carta responsiva con datos
 Route::match(['post', 'delete','put'],'actualizar/carta_responsiva/{name}/{nombre}', [Estancia2Controller::class, 'actualizar_carta_responsiva_estancia'])
 ->name('actualizar_carta_responsiva_estancia.index');

 //enviar documento carta responsiva sin datos 
 Route::match(['post', 'delete','put','get'],'subir/carta_responsiva/{name}/{nombre}', [Estancia2Controller::class, 'subir_carta_responsiva_estancia'])
 ->name('subir_carta_responsiva_estancia.index');

 //cancelar solicitud documento carta responsiva
 Route::match(['post', 'delete','put'], '/carta_responsiva/{id_d}/{nombre}',[PdfController::class,'cancelar_carta_responsiva_Estancia'])
 ->name('cancelar_carta_responsiva_Estancia.index');

 //descargar con datos f01
 Route::get('/descarga_cd_estancia_f01', [PdfController::class, 'descarga_cd_f01_estancia'])
 ->name('descarga_cd_estancia_f01.index');

 //enviar documento f01 con datos
 Route::match(['post', 'delete','put'],'actualizar/f01/{name}/{nombre}', [Estancia2Controller::class, 'actualizarF01_estancia'])
 ->name('actualizar_f01_estancia.index');

 //enviar documento f01 sin datos 
 Route::match(['post', 'delete','put','get'],'subir/f01/{name}/{nombre}', [Estancia2Controller::class, 'subirF01_estancia'])
 ->name('subir_f01_estancia.index');

 //cancelar solicitud documento f01
 Route::match(['post', 'delete','put'], '/f01/{id_d}/{nombre}',[PdfController::class,'cancelarF01_Estancia'])
 ->name('cancelar_f01_Estancia.index');

 //descargar con datos f02
 Route::get('/descarga_cd_estancia_f02', [PdfController::class, 'descarga_cd_f02_estancia'])
 ->name('descarga_cd_estancia_f02.index');

 //enviar documento f02 con datos
 Route::match(['post', 'delete','put'],'actualizar/f02/{name}/{nombre}', [Estancia2Controller::class, 'actualizarF02_estancia'])
 ->name('actualizar_f02_estancia.index');

 //enviar documento f02 sin datos 
 Route::match(['post', 'delete','put','get'],'subir/f02/{name}/{nombre}', [Estancia2Controller::class, 'subirF02_estancia'])
 ->name('subir_f02_estancia.index');

 //cancelar solicitud documento f02
 Route::match(['post', 'delete','put'], '/f02/{id_d}/{nombre}',[PdfController::class,'cancelarF02_Estancia'])
 ->name('cancelar_f02_Estancia.index');

 //llenar f03
 Route::get('/home', [CedulaController::class, 'ver'])
 ->name('home.index')
 ->middleware('auth');

 Route::post('/home', [CedulaController::class, 'store'])
    ->name('home.store');


 //descargar sin datos f03
 Route::get('/descarga_sd_estancia_f03', [DescargaController::class, 'descarga_sd_estancia_f03'])
 ->name('descarga_sd_estancia_f03.index');

 //descargar con datos f03
 Route::get('/descarga_cd_estancia_f03', [PdfController::class, 'descarga_cd_estancia_f03'])
 ->name('descarga_cd_estancia_f03.index');

 //eliminar f03 estancia
 Route::match(['post', 'delete','put','get'],'/f03Estancia/{id_a}/{id_e}/{id_a_e}/{id_a_a}/{id_p}',[PdfController::class,'eliminarF03Estancia'])
 ->name('eliminar_f03');

 //enviar documento f03 con datos
 Route::match(['post', 'delete','put'],'actualizar/f03/{name}/{nombre}', [Estancia2Controller::class, 'actualizarF03_estancia'])
 ->name('actualizar_f03_estancia.index');

 //enviar documento f03 sin datos 
 Route::match(['post', 'delete','put','get'],'subir/f03/{name}/{nombre}', [Estancia2Controller::class, 'subirF03_estancia'])
 ->name('subir_f03_estancia.index');

 //cancelar solicitud documento f03
 Route::match(['post', 'delete','put'], '/f03/{id_d}/{nombre}',[PdfController::class,'cancelarF03_Estancia'])
 ->name('cancelar_f03_Estancia.index');


 //llenar datos f04
 Route::get('/usuario_estancia/f04-definicion_de_proyecto', [definicionController::class, 'ver'])
 ->name('f04Formulario.index')
 ->middleware('auth');


 //guardar f04
 Route::post('/usuario/f04-definicion_de_proyecto', [definicion_proyectoController::class, 'store'])
 ->name('f04Guardar.index');

 //eliminar f04
 Route::match(['post', 'delete','put','get'],'/f04/{id_a}/{id_a_e}/{id_p}/{id_d}',[PdfController::class,'eliminarF04'])
 ->name('eliminar_f04.index');

 //descargar f04 con datos
 Route::get('/descarga_cd_estacia_f04', [PdfController::class, 'descarga_cd_estancia_f04'])
 ->name('descarga_cd_estancia_f04.index');

 //enviar documento f04 con datos
 Route::match(['post', 'delete','put'],'actualizar/f04/{name}/{nombre}', [Estancia2Controller::class, 'actualizarF04_estancia'])
 ->name('actualizar_f04_estancia.index');

 //enviar documento f04 sin datos 
 Route::match(['post', 'delete','put','get'],'subir/f04/{name}/{nombre}', [Estancia2Controller::class, 'subirF04_estancia'])
 ->name('subir_f04_estancia.index');

 //cancelar solicitud documento f04
 Route::match(['post', 'delete','put'], '/f04_estancia/{id_d}/{nombre}',[PdfController::class,'cancelarF04_Estancia'])
 ->name('cancelar_f04_Estancia.index');

 //descargar f05 con datos
 Route::get('/descarga_cd_estacia_f05', [PdfController::class, 'descarga_cd_estancia_f05'])
 ->name('descarga_cd_estancia_f05.index');

 //enviar documento f05 con datos
 Route::match(['post', 'delete','put'],'actualizar/f05/{name}/{nombre}', [Estancia2Controller::class, 'actualizarF05_estancia'])
 ->name('actualizar_f05_estancia.index');

 //enviar documento f05 sin datos 
 Route::match(['post', 'delete','put','get'],'subir/f05/{name}/{nombre}', [Estancia2Controller::class, 'subirF05_estancia'])
 ->name('subir_f05_estancia.index');

 //cancelar solicitud documento f05
 Route::match(['post', 'delete','put'], '/f05/{id_d}/{nombre}',[PdfController::class,'cancelarF05_Estancia'])
 ->name('cancelar_f05_Estancia.index');

 //reporte evaluacion
 //Descarga
 Route::match(['post', 'delete','put','get'],'descarga/reporte_evaluaciona_estancia', [DescargaController::class, 'descarga_reporte_estancia'])
 ->name('descarga_reporte_evaluacion_estancia.index');


 //Descarga
 Route::match(['post', 'delete','put','get'],'descarga/carta_responsiva_estancia', [DescargaController::class, 'descarga_carta_responsiva'])
 ->name('descarga_carta_responsiva.index');





//-------------------formatos estadias
    Route::match(['post','get'],'/estadia', [EstadiaController::class, 'ver'])
    ->name('estadia.index')
    ->middleware('auth');
 //carga horaria
    //enviar documento carga horaria con datos
    Route::match(['post', 'delete','put'],'actualizar_estadia/carga_horaria/{name}/{nombre}', [EstadiaController::class, 'actualizar_carga_horaria_estadia'])
    ->name('actualizar_carga_horaria_estadia.index');

    //enviar documento  carga horaria sin datos 
    Route::match(['post', 'delete','put','get'],'subir_estadia/carga_horaria/{name}/{nombre}', [EstadiaController::class, 'subir_carga_horaria_estadia'])
    ->name('subir_carga_horaria_estadia.index');

    //cancelar solicitud documento carga horaria
    Route::match(['post', 'delete','put'], '/carga_horaria_estadia/{id_d}/{nombre}',[PdfController::class,'cancelar_carga_horaria_Estadia'])
    ->name('cancelar_carga_horaria_Estadia.index');
 //constancia derecho
    //enviar documento f01 con datos
    Route::match(['post', 'delete','put'],'actualizar_estadia/constancia_derecho/{name}/{nombre}', [EstadiaController::class, 'actualizar_constancia_derecho_estadia'])
    ->name('actualizar_constancia_derecho_estadia.index');

    //enviar documento f01 sin datos 
    Route::match(['post', 'delete','put','get'],'subir_estadia/constancia_derecho/{name}/{nombre}', [EstadiaController::class, 'subir_constancia_derecho_estadia'])
    ->name('subir_constancia_derecho_estadia.index');

    //cancelar solicitud documento f01
    Route::match(['post', 'delete','put'], '/constancia_derecho_estadia/{id_d}/{nombre}',[PdfController::class,'cancelar_constancia_derecho_Estadia'])
    ->name('cancelar_constancia_derecho_Estadia.index');

 //carta responsiva
    //enviar documento f01 con datos
    Route::match(['post', 'delete','put'],'actualizar_estadia/carta_responsiva_derecho/{name}/{nombre}', [EstadiaController::class, 'actualizar_carta_responsiva_estadia'])
    ->name('actualizar_carta_responsiva_estadia.index');

    //enviar documento f01 sin datos 
    Route::match(['post', 'delete','put','get'],'subir_estadia/carta_responsiva/{name}/{nombre}', [EstadiaController::class, 'subir_carta_responsiva_estadia'])
    ->name('subir_carta_responsiva_estadia.index');

    //cancelar solicitud documento f01
    Route::match(['post', 'delete','put'], '/carta_responsiva_estadia/{id_d}/{nombre}',[PdfController::class,'cancelar_carta_responsiva_Estadia'])
    ->name('cancelar_carta_responsiva_Estadia.index');
 //f01
    //descargar con datos f01
    Route::get('/descarga_cd_estadia_f01', [PdfController::class, 'descarga_cd_f01_estadia'])
    ->name('descarga_cd_estadia_f01.index');

    //llenar f01
    Route::get('/Carta_aceptacion', [carta_aceptacionController::class, 'ver'])
    ->name('llenar_carta_aceptacion.index')
    ->middleware('auth');;
    
    //guardar f01
    Route::post('/usuario_estadia/f01-carta_aceptacion', [carta_aceptacionController::class, 'store_f01'])
    ->name('f01Guardar_estadia.index');

    //enviar documento f01 con datos
    Route::match(['post', 'delete','put'],'actualizar_estadia/f01/{name}/{nombre}', [EstadiaController::class, 'actualizarF01_estadia'])
    ->name('actualizar_f01_estadia.index');

    //enviar documento f01 sin datos 
    Route::match(['post', 'delete','put','get'],'subir_estadia/f01/{name}/{nombre}', [EstadiaController::class, 'subirF01_estadia'])
    ->name('subir_f01_estadia.index');

    //cancelar solicitud documento f01
    Route::match(['post', 'delete','put'], '/f01_estadia/{id_d}/{nombre}',[PdfController::class,'cancelarF01_Estadia'])
    ->name('cancelar_f01_Estadia.index');
 //f02
    //descargar con datos f02
    Route::get('/descarga_cd_estadia_f02', [PdfController::class, 'descarga_cd_f02_estadia'])
    ->name('descarga_cd_estadia_f02.index');
    
    //enviar documento f02 con datos
    Route::match(['post', 'delete','put'],'actualizar_estadia/f02/{name}/{nombre}', [EstadiaController::class, 'actualizarF02_estadia'])
    ->name('actualizar_f02_estadia.index');

    //enviar documento f02 sin datos 
    Route::match(['post', 'delete','put','get'],'subir_estadia/f02/{name}/{nombre}', [EstadiaController::class, 'subirF02_estadia'])
    ->name('subir_f02_estadia.index');

    //cancelar solicitud documento f02
    Route::match(['post', 'delete','put'], '/f02_estadia/{id_d}/{nombre}',[PdfController::class,'cancelarF02_Estadia'])
    ->name('cancelar_f02_Estadia.index');
 //f03
    //descargar sin datos f03
    Route::get('/descarga_sd_estadia_f03', [DescargaController::class, 'descarga_sd_estadia_f03'])
    ->name('descarga_sd_estadia_f03.index');

    //descargar con datos f03
    Route::get('/descarga_cd_estadia_f03', [PdfController::class, 'descarga_cd_estadia_f03'])
    ->name('descarga_cd_estadia_f03.index');

    //eliminar f03
        Route::match(['post', 'delete','put','get'],'/f03Estadia/{id_a}/{id_e}/{id_a_e}/{id_a_a}/{id_p}',[PdfController::class,'eliminarF03Estadia'])
        ->name('eliminar_f03Estadia.index');

    //enviar documento f03 con datos
    Route::match(['post', 'delete','put'],'actualizar/f03_estadia/{name}/{nombre}', [EstadiaController::class, 'actualizarF03_estadia'])
    ->name('actualizar_f03_estadia.index');
    
    //enviar documento f03 sin datos 
    Route::match(['post', 'delete','put'],'subir/f03_estadia/{name}/{nombre}', [EstadiaController::class, 'subirF03_estadia'])
    ->name('subir_f03_estadia.index');

    //cancelar solicitud documento f03
    Route::match(['post', 'delete','put'], '/f03_estadia/{id_d}/{nombre}',[PdfController::class,'cancelarF03_Estadia'])
    ->name('cancelar_f03_Estadia.index');

 //f04
    //descargar f04 con datos
    Route::get('/descarga_cd_estadia_f04', [PdfController::class, 'descarga_cd_estadia_f04'])
    ->name('descarga_cd_estadia_f04.index');

    //llenar datos f04
    Route::get('/usuario_estadia/f04-definicion_de_proyecto', [definicionController::class, 'ver_estadia'])
    ->name('f04Formulario_estadia.index')
    ->middleware('auth');

    //guardar f04
    Route::post('/usuario_estadia/f04-definicion_de_proyecto', [definicion_proyectoController::class, 'store_estadia'])
    ->name('f04Guardar_estadia.index');

    //eliminar f04
    Route::match(['post', 'delete','put','get'],'/f04_estadia/{id_a}/{id_a_e}/{id_p}/{id_d}',[PdfController::class,'eliminarF04Estadia'])
    ->name('eliminar_f04_estadia.index');


    //enviar documento f04 con datos
    Route::match(['post', 'delete','put'],'actualizar_estadia/f04/{name}/{nombre}', [EstadiaController::class, 'actualizarF04_estadia'])
    ->name('actualizar_f04_estadia.index');

    //enviar documento f04 sin datos 
    Route::match(['post', 'delete','put','get'],'subir_estadia/f04/{name}/{nombre}', [EstadiaController::class, 'subirF04_estadia'])
    ->name('subir_f04_estadia.index');

    //cancelar solicitud documento f04
    Route::match(['post', 'delete','put'], '/f04/{id_d}/{nombre}',[PdfController::class,'cancelarF04_Estadia'])
    ->name('cancelar_f04_Estadia.index');

 //f05
    //descargar f05 con datos
    Route::get('/descarga_cd_estadia_f05', [PdfController::class, 'descarga_cd_estadia_f05'])
    ->name('descarga_cd_estadia_f05.index');

    //enviar documento f05 con datos
    Route::match(['post', 'delete','put'],'actualizar_estadia/f05/{name}/{nombre}', [EstadiaController::class, 'actualizarF05_estadia'])
    ->name('actualizar_f05_estadia.index');
    
    //enviar documento f05 sin datos 
    Route::match(['post', 'delete','put','get'],'subir_estadia/f05/{name}/{nombre}', [EstadiaController::class, 'subirF05_estadia'])
    ->name('subir_f05_estadia.index');

    //cancelar solicitud documento f05
    Route::match(['post', 'delete','put'], '/f05_estadia/{id_d}/{nombre}',[PdfController::class,'cancelarF05_estadia'])
    ->name('cancelar_f05_estadia.index');

 //reporte evaluacion
    //Descarga
    Route::match(['post', 'delete','put','get'],'descarga/reporte_evaluacion', [DescargaController::class, 'descarga_reporte_estadia'])
    ->name('descarga_reporte_evaluacion.index');



//------------------estadia_nacionales
    Route::match(['post','get'],'/estadia_nacionales', [Estadia_NacionalesController::class, 'ver'])
    ->name('estadia_nacionales.index')
    ->middleware('auth');



//------------------------servicio_sociales
    Route::match(['post','get'],'/servicio_sociales', [servicio_socialesController::class, 'ver'])
    ->name('servicio_sociales.index')
    ->middleware('auth');

//------------fallos
    Route::match(['post','get'],'/errores', [falloController::class, 'ver'])
    ->name('fallos.index')
    ->middleware('auth');;

    

    //registro final cedula f03

    Route::match(['post','get'],'/registro_final_cedula', [falloController::class, 'verRegistroFinalCedula'])
    ->name('registro_final_cedula.index')
    ->middleware('auth');;


    //registro final definicion f04
    Route::match(['post','get'],'/registro_final_definicion', [falloController::class, 'verRegistroFinalDefinicion'])
    ->name('registro_final_definicion.index')
    ->middleware('auth');;
//---observaciones documentos estancia 1 ------
    //Ver Observaciones  Carga horaria del admin vista usuario
    Route::match(['post','get'],'/observaciones_carga_horaria', [Estancia1Controller::class, 'verObservaciones_carga_horaria'])
    ->name('observaciones_carga_horaria_estancia.index')
    ->middleware('auth');

    //Ver Observaciones  Carga horaria del admin vista usuario estadia
    Route::match(['post','get'],'/observaciones_carga_horaria_Estadia', [EstadiaController::class, 'verObservaciones_carga_horaria_Estadia'])
    ->name('obsevaciones_carga_horaria_estadia.index')
    ->middleware('auth');

    //Ver Observaciones Constancia derecho del admin vista usuario
    Route::match(['post','get'],'/observaciones_constancia_derecho', [Estancia1Controller::class, 'verObservaciones_constancia_derecho'])
    ->name('obsevaciones_constancia_derecho.index')
    ->middleware('auth');

    //Ver Observaciones Constancia derecho del admin vista usuario estadia
    Route::match(['post','get'],'/observaciones_constancia_derecho_Estadia', [EstadiaController::class, 'verObservaciones_constancia_derecho_Estadia'])
    ->name('obsevaciones_constancia_derecho_estadia.index')
    ->middleware('auth');
    
     //Ver Observaciones Carta responsiva del admin vista usuario
     Route::match(['post','get'],'/observaciones_carta_responsiva', [Estancia1Controller::class, 'verObservaciones_carta_responsiva'])
     ->name('obsevaciones_carta_responsiva.index')
     ->middleware('auth');
 
     //Ver Observaciones Carta responsiva del admin vista usuario estadia
     Route::match(['post','get'],'/observaciones_carta_responsiva_Estadia', [EstadiaController::class, 'verObservaciones_carta_responsiva_Estadia'])
     ->name('obsevaciones_carta_responsiva_estadia.index')
     ->middleware('auth');

    //Ver Observaciones  f01 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f02', [Estancia1Controller::class, 'verObservaciones_f02'])
    ->name('obsevaciones_f02.index')
    ->middleware('auth');

    //Ver Observaciones  f01 del admin vista usuario estadia
    Route::match(['post','get'],'/observaciones_f01_Estadia', [EstadiaController::class, 'verObservaciones_f01_Estadia'])
    ->name('obsevaciones_f01_estadia.index')
    ->middleware('auth');

    //Ver Observaciones  f02 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f01', [Estancia1Controller::class, 'verObservaciones_f01'])
    ->name('obsevaciones_f01_estancia.index')
    ->middleware('auth');

     //Ver Observaciones  f02 del admin vista usuario estadia
     Route::match(['post','get'],'/observaciones_f02_Estadia', [EstadiaController::class, 'verObservaciones_f02_Estadia'])
     ->name('obsevaciones_f02_estadia.index')
     ->middleware('auth');
     
    //Ver Observaciones  f03 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f03', [Estancia1Controller::class, 'verObservaciones_f03'])
    ->name('obsevaciones_f03.index')
    ->middleware('auth');


    //Ver Observaciones f03 del admin vista usuario estadia
    Route::match(['post','get'],'/observaciones_estadia', [EstadiaController::class, 'verObservaciones_f03_estadia'])
    ->name('obsevaciones_f03_estadia.index')
    ->middleware('auth');

    //Ver Observaciones  f04 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f04', [Estancia1Controller::class, 'verObservaciones_f04'])
    ->name('obsevaciones_f04.index')
    ->middleware('auth');

     //Ver Observaciones  f04 del admin vista usuario estadia
     Route::match(['post','get'],'/observaciones_f04_Estadia', [EstadiaController::class, 'verObservaciones_f04_Estadia'])
     ->name('obsevaciones_f04_estadia.index')
     ->middleware('auth');

    //Ver Observaciones  f05 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f05', [Estancia1Controller::class, 'verObservaciones_f05'])
    ->name('obsevaciones_f05.index')
    ->middleware('auth');

     //Ver Observaciones  f05 del admin vista usuario  estadia
     Route::match(['post','get'],'/observaciones_f05_Estadia', [EstadiaController::class, 'verObservaciones_f05_Estadia'])
     ->name('obsevaciones_f05_estadia.index')
     ->middleware('auth');
//--------Observaciones documentos estancia 2 ------
    //Ver Observaciones  Carga horaria del admin vista usuario
    Route::match(['post','get'],'/observaciones_carga_horaria', [Estancia2Controller::class, 'verObservaciones_carga_horaria'])
    ->name('observaciones_carga_horaria_estancia.index')
    ->middleware('auth');

    //Ver Observaciones  Carga horaria del admin vista usuario estadia
    Route::match(['post','get'],'/observaciones_carga_horaria_Estadia', [EstadiaController::class, 'verObservaciones_carga_horaria_Estadia'])
    ->name('obsevaciones_carga_horaria_estadia.index')
    ->middleware('auth');

    //Ver Observaciones Constancia derecho del admin vista usuario
    Route::match(['post','get'],'/observaciones_constancia_derecho', [Estancia2Controller::class, 'verObservaciones_constancia_derecho'])
    ->name('obsevaciones_constancia_derecho.index')
    ->middleware('auth');

    //Ver Observaciones Constancia derecho del admin vista usuario estadia
    Route::match(['post','get'],'/observaciones_constancia_derecho_Estadia', [EstadiaController::class, 'verObservaciones_constancia_derecho_Estadia'])
    ->name('obsevaciones_constancia_derecho_estadia.index')
    ->middleware('auth');
    
     //Ver Observaciones Carta responsiva del admin vista usuario
     Route::match(['post','get'],'/observaciones_carta_responsiva', [Estancia2Controller::class, 'verObservaciones_carta_responsiva'])
     ->name('obsevaciones_carta_responsiva.index')
     ->middleware('auth');
 
     //Ver Observaciones Carta responsiva del admin vista usuario estadia
     Route::match(['post','get'],'/observaciones_carta_responsiva_Estadia', [EstadiaController::class, 'verObservaciones_carta_responsiva_Estadia'])
     ->name('obsevaciones_carta_responsiva_estadia.index')
     ->middleware('auth');

    //Ver Observaciones  f01 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f02', [Estancia2Controller::class, 'verObservaciones_f02'])
    ->name('obsevaciones_f02.index')
    ->middleware('auth');

    //Ver Observaciones  f01 del admin vista usuario estadia
    Route::match(['post','get'],'/observaciones_f01_Estadia', [EstadiaController::class, 'verObservaciones_f01_Estadia'])
    ->name('obsevaciones_f01_estadia.index')
    ->middleware('auth');

    //Ver Observaciones  f02 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f01', [Estancia2Controller::class, 'verObservaciones_f01'])
    ->name('obsevaciones_f01_estancia.index')
    ->middleware('auth');

     //Ver Observaciones  f02 del admin vista usuario estadia
     Route::match(['post','get'],'/observaciones_f02_Estadia', [EstadiaController::class, 'verObservaciones_f02_Estadia'])
     ->name('obsevaciones_f02_estadia.index')
     ->middleware('auth');
     
    //Ver Observaciones  f03 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f03', [Estancia2Controller::class, 'verObservaciones_f03'])
    ->name('obsevaciones_f03.index')
    ->middleware('auth');


    //Ver Observaciones f03 del admin vista usuario estadia
    Route::match(['post','get'],'/observaciones_estadia', [EstadiaController::class, 'verObservaciones_f03_estadia'])
    ->name('obsevaciones_f03_estadia.index')
    ->middleware('auth');

    //Ver Observaciones  f04 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f04', [Estancia2Controller::class, 'verObservaciones_f04'])
    ->name('obsevaciones_f04.index')
    ->middleware('auth');

     //Ver Observaciones  f04 del admin vista usuario estadia
     Route::match(['post','get'],'/observaciones_f04_Estadia', [EstadiaController::class, 'verObservaciones_f04_Estadia'])
     ->name('obsevaciones_f04_estadia.index')
     ->middleware('auth');

    //Ver Observaciones  f05 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f05', [Estancia2Controller::class, 'verObservaciones_f05'])
    ->name('obsevaciones_f05.index')
    ->middleware('auth');

     //Ver Observaciones  f05 del admin vista usuario  estadia
     Route::match(['post','get'],'/observaciones_f05_Estadia', [EstadiaController::class, 'verObservaciones_f05_Estadia'])
     ->name('obsevaciones_f05_estadia.index')
     ->middleware('auth');