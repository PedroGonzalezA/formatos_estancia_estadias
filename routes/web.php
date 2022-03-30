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
use App\Http\Controllers\documentosEstadiaAdminController;
use App\Http\Controllers\documentosEstanciaAdminController;
use App\Http\Controllers\EstadiaController;
use App\Http\Controllers\EstanciaController;
use App\Http\Controllers\falloController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ScrollController;
use App\Http\Controllers\UsuariosController;
use App\Models\documentos;
use App\Models\Formulario;
use App\Models\universidad;

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
//estancia
    Route::match(['post','get'],'/estancia_Documentos', [documentosEstanciaAdminController::class, 'ver'])
    ->name('documentoEstanciaAdmin.index')
    ->middleware('auth.admin');

        //ver con datos f02
        Route::match(['post','get'],'/ver_cd_estancia_f02/admin/{name}', [documentosEstanciaAdminController::class, 'ver_cd_estancia_f02_admin'])
        ->name('ver_cd_estancia_f02_admin.index')
        ->middleware('auth.admin');

        //aceptar  f02
        Route::match(['post','get','put'],'/aceptar_estancia_f02/admin/{idU}/{id}/{name}', [documentosEstanciaAdminController::class, 'aceptar_estancia_f02_admin'])
        ->name('aceptar_estancia_f02_admin.index');

        //pendiente f02
        Route::match(['post','get','put'],'/pendiente_estancia_f02/admin/{idU}/{id}/{name}', [documentosEstanciaAdminController::class, 'pendiente_estancia_f02_admin'])
        ->name('pendiente_estancia_f02_admin.index');

        //observaciones  f02
        Route::match(['post','get','put'],'/observaciones_estancia_f02/admin', [documentosEstanciaAdminController::class, 'observaciones_estancia_f02_admin'])
        ->name('observaciones_estancia_f02_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f02
        Route::match(['get','post','put'],'/guardar_observaciones_estancia_f02_admin/{id}', [documentosEstanciaAdminController::class, 'guardarObservaciones_estancia_f02_admin'])
        ->name('guardarObservaciones_estancia_f02_admin.index');

        //con Observaciones  f02
        Route::match(['post','get'],'/con_Observaciones_estancia_f02_admin', [documentosEstanciaAdminController::class, 'conObservaciones_estancia_f02_admin'])
        ->name('conObservaciones_estancia_f02_admin.index')
        ->middleware('auth.admin');


        //ver con datos f03
        Route::match(['post','get'],'/ver_cd_estancia_f03/admin/{name}', [documentosEstanciaAdminController::class, 'ver_cd_estancia_f03_admin'])
        ->name('ver_cd_estancia_f03_admin.index')
        ->middleware('auth.admin');

        //aceptar  f03
        Route::match(['post','get','put'],'/aceptar_estancia_f03/admin/{idU}/{id}/{name}', [documentosEstanciaAdminController::class, 'aceptar_estancia_f03_admin'])
        ->name('aceptar_estancia_f03_admin.index');

        //pendiente f03
        Route::match(['post','get','put'],'/pendiente_estancia_f03/admin/{idU}/{id}/{name}', [documentosEstanciaAdminController::class, 'pendiente_estancia_f03_admin'])
        ->name('pendiente_estancia_f03_admin.index');

        //observaciones  f03
        Route::match(['post','get','put'],'/observaciones_estancia_f03/admin', [documentosEstanciaAdminController::class, 'observaciones_estancia_f03_admin'])
        ->name('observaciones_estancia_f03_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f03
        Route::match(['get','post','put'],'/guardar_observaciones_estancia_f03_admin/{id}', [documentosEstanciaAdminController::class, 'guardarObservaciones_estancia_f03_admin'])
        ->name('guardarObservaciones_estancia_f03_admin.index');
  
        //con Observaciones  f03
        Route::match(['post','get'],'/con_Observaciones_estancia_f03_admin', [documentosEstanciaAdminController::class, 'conObservaciones_estancia_f03_admin'])
        ->name('conObservaciones_estancia_f03_admin.index')
        ->middleware('auth.admin');

        //ver con datos f04
        Route::match(['post','get'],'/ver_cd_estancia_f04/admin/{name}', [documentosEstanciaAdminController::class, 'ver_cd_estancia_f04_admin'])
        ->name('ver_cd_estancia_f04_admin.index')
        ->middleware('auth.admin');

        //aceptar  f04
        Route::match(['post','get','put'],'/aceptar_estancia_f04/admin/{idU}/{id}/{name}', [documentosEstanciaAdminController::class, 'aceptar_estancia_f04_admin'])
        ->name('aceptar_estancia_f04_admin.index');

        //pendiente f04
        Route::match(['post','get','put'],'/pendiente_estancia_f04/admin/{idU}/{id}/{name}', [documentosEstanciaAdminController::class, 'pendiente_estancia_f04_admin'])
        ->name('pendiente_estancia_f04_admin.index');

        //observaciones  f04
        Route::match(['post','get','put'],'/observaciones_estancia_f04/admin', [documentosEstanciaAdminController::class, 'observaciones_estancia_f04_admin'])
        ->name('observaciones_estancia_f04_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f04
        Route::match(['get','post','put'],'/guardar_observaciones_estancia_f04_admin/{id}', [documentosEstanciaAdminController::class, 'guardarObservaciones_estancia_f04_admin'])
        ->name('guardarObservaciones_estancia_f04_admin.index');

        //con Observaciones  f04
        Route::match(['post','get'],'/con_Observaciones_estancia_f04_admin', [documentosEstanciaAdminController::class, 'conObservaciones_estancia_f04_admin'])
        ->name('conObservaciones_estancia_f04_admin.index')
        ->middleware('auth.admin');

        //ver con datos f05
        Route::match(['post','get'],'/ver_cd_estancia_f05/admin/{name}', [documentosEstanciaAdminController::class, 'ver_cd_estancia_f05_admin'])
        ->name('ver_cd_estancia_f05_admin.index')
        ->middleware('auth.admin');

        //aceptar  f05
        Route::match(['post','get','put'],'/aceptar_estancia_f05/admin/{idU}/{id}/{name}', [documentosEstanciaAdminController::class, 'aceptar_estancia_f05_admin'])
        ->name('aceptar_estancia_f05_admin.index');

        //pendiente f05
        Route::match(['post','get','put'],'/pendiente_estancia_f05/admin/{idU}/{id}/{name}', [documentosEstanciaAdminController::class, 'pendiente_estancia_f05_admin'])
        ->name('pendiente_estancia_f05_admin.index');

        //observaciones  f05
        Route::match(['post','get','put'],'/observaciones_estancia_f05/admin', [documentosEstanciaAdminController::class, 'observaciones_estancia_f05_admin'])
        ->name('observaciones_estancia_f05_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f05
        Route::match(['get','post','put'],'/guardar_observaciones_estancia_f05_admin/{id}', [documentosEstanciaAdminController::class, 'guardarObservaciones_estancia_f05_admin'])
        ->name('guardarObservaciones_estancia_f05_admin.index');

        //con Observaciones  f05
        Route::match(['post','get'],'/con_Observaciones_estancia_f05_admin', [documentosEstanciaAdminController::class, 'conObservaciones_estancia_f05_admin'])
        ->name('conObservaciones_estancia_f05_admin.index')
        ->middleware('auth.admin');

        //buscardor
        Route::get('/buscar', [documentosEstanciaAdminController::class, 'buscador_estancia'])
        ->name('buscar_estancia.index');

        //buscardor
        Route::get('/buscar_datos_c', [documentosEstanciaAdminController::class, 'buscador_estancia_c'])
        ->name('buscar_estancia_c.index');

//estadias
    Route::match(['post','get'],'/estadia_Documentos', [documentosEstadiaAdminController::class, 'ver'])
    ->name('documentoEstadiaAdmin.index')
    ->middleware('auth.admin');

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
        Route::match(['post','get','put'],'/observaciones_estadia_f02/admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_f02_admin'])
        ->name('observaciones_estadia_f02_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f02
        Route::match(['get','post','put'],'/guardar_observaciones_estadia_f02_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_f02_admin'])
        ->name('guardarObservaciones_estadia_f02_admin.index');

        //con Observaciones  f02
        Route::match(['post','get'],'/con_Observaciones_estadia_f02_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_f02_admin'])
        ->name('conObservaciones_estadia_f02_admin.index')
        ->middleware('auth.admin');

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
        Route::match(['post','get','put'],'/observaciones_estadia_f03/admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_f03_admin'])
        ->name('observaciones_estadia_f03_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f03
        Route::match(['get','post','put'],'/guardar_observaciones_estadia_f03_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_f03_admin'])
        ->name('guardarObservaciones_estadia_f03_admin.index');
  
        //con Observaciones  f03
        Route::match(['post','get'],'/con_Observaciones_estadia_f03_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_f03_admin'])
        ->name('conObservaciones_estadia_f03_admin.index')
        ->middleware('auth.admin');
        
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
        Route::match(['post','get','put'],'/observaciones_estadia_f04/admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_f04_admin'])
        ->name('observaciones_estadia_f04_admin.index')
        ->middleware('auth.admin');


        //guardar observaciones f04
        Route::match(['get','post','put'],'/guardar_observaciones_estadia_f04_admin/{id}', [documentosEstadiaAdminController::class, 'guardarObservaciones_estadia_f04_admin'])
        ->name('guardarObservaciones_estadia_f04_admin.index');

        //con Observaciones  f04
        Route::match(['post','get'],'/con_Observaciones_estadia_f04_admin', [documentosEstadiaAdminController::class, 'conObservaciones_estadia_f04_admin'])
        ->name('conObservaciones_estadia_f04_admin.index')
        ->middleware('auth.admin');

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
        Route::match(['post','get','put'],'/observaciones_estadia_f05/admin', [documentosEstadiaAdminController::class, 'observaciones_estadia_f05_admin'])
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
//formato estancias
    Route::match(['post','get'],'/estancia', [EstanciaController::class, 'ver'])
    ->name('estancia.index')
    ->middleware('auth');

    //descargar con datos f01
    Route::get('/descarga_cd_estancia_f01', [PdfController::class, 'descarga_cd_f01_estancia'])
    ->name('descarga_cd_estancia_f01.index');

    //descargar con datos f02
    Route::get('/descarga_cd_estancia_f02', [PdfController::class, 'descarga_cd_f02_estancia'])
    ->name('descarga_cd_estancia_f02.index');

    //enviar documento f02 con datos
    Route::match(['post', 'delete','put'],'actualizar/f02/{name}/{nombre}', [EstanciaController::class, 'actualizarF02_estancia'])
    ->name('actualizar_f02_estancia.index');

    //enviar documento f02 sin datos 
    Route::match(['post', 'delete','put','get'],'subir/f02/{name}/{nombre}', [EstanciaController::class, 'subirF02_estancia'])
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
    Route::match(['post', 'delete','put'],'actualizar/f03/{name}/{nombre}', [EstanciaController::class, 'actualizarF03_estancia'])
    ->name('actualizar_f03_estancia.index');

    //enviar documento f03 sin datos 
    Route::match(['post', 'delete','put','get'],'subir/f03/{name}/{nombre}', [EstanciaController::class, 'subirF03_estancia'])
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
    Route::match(['post', 'delete','put'],'actualizar/f04/{name}/{nombre}', [EstanciaController::class, 'actualizarF04_estancia'])
    ->name('actualizar_f04_estancia.index');

    //enviar documento f04 sin datos 
    Route::match(['post', 'delete','put','get'],'subir/f04/{name}/{nombre}', [EstanciaController::class, 'subirF04_estancia'])
    ->name('subir_f04_estancia.index');

    //cancelar solicitud documento f04
    Route::match(['post', 'delete','put'], '/f04_estancia/{id_d}/{nombre}',[PdfController::class,'cancelarF04_Estancia'])
    ->name('cancelar_f04_Estancia.index');

    //descargar f05 con datos
    Route::get('/descarga_cd_estacia_f05', [PdfController::class, 'descarga_cd_estancia_f05'])
    ->name('descarga_cd_estancia_f05.index');

    //enviar documento f05 con datos
    Route::match(['post', 'delete','put'],'actualizar/f05/{name}/{nombre}', [EstanciaController::class, 'actualizarF05_estancia'])
    ->name('actualizar_f05_estancia.index');
   
    //enviar documento f05 sin datos 
    Route::match(['post', 'delete','put','get'],'subir/f05/{name}/{nombre}', [EstanciaController::class, 'subirF05_estancia'])
    ->name('subir_f05_estancia.index');

    //cancelar solicitud documento f05
    Route::match(['post', 'delete','put'], '/f05/{id_d}/{nombre}',[PdfController::class,'cancelarF05_Estancia'])
    ->name('cancelar_f05_Estancia.index');

//formatos estadias
    Route::match(['post','get'],'/estadia', [EstadiaController::class, 'ver'])
    ->name('estadia.index')
    ->middleware('auth');
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
        

//fallos
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

    //Ver Observaciones  f02 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f02', [EstanciaController::class, 'verObservaciones_f02'])
    ->name('obsevaciones_f02.index')
    ->middleware('auth');

     //Ver Observaciones  f02 del admin vista usuario estadia
     Route::match(['post','get'],'/observaciones_f02_Estadia', [EstadiaController::class, 'verObservaciones_f02_Estadia'])
     ->name('obsevaciones_f02_estadia.index')
     ->middleware('auth');
     
    //Ver Observaciones  f03 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f03', [EstanciaController::class, 'verObservaciones_f03'])
    ->name('obsevaciones_f03.index')
    ->middleware('auth');


    //Ver Observaciones f03 del admin vista usuario estadia
    Route::match(['post','get'],'/observaciones_estadia', [EstadiaController::class, 'verObservaciones_f03_estadia'])
    ->name('obsevaciones_f03_estadia.index')
    ->middleware('auth');

    //Ver Observaciones  f04 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f04', [EstanciaController::class, 'verObservaciones_f04'])
    ->name('obsevaciones_f04.index')
    ->middleware('auth');

     //Ver Observaciones  f04 del admin vista usuario estadia
     Route::match(['post','get'],'/observaciones_f04_Estadia', [EstadiaController::class, 'verObservaciones_f04_Estadia'])
     ->name('obsevaciones_f04_estadia.index')
     ->middleware('auth');

    //Ver Observaciones  f05 del admin vista usuario
    Route::match(['post','get'],'/observaciones_f05', [EstanciaController::class, 'verObservaciones_f05'])
    ->name('obsevaciones_f05.index')
    ->middleware('auth');

     //Ver Observaciones  f05 del admin vista usuario  estadia
     Route::match(['post','get'],'/observaciones_f05_Estadia', [EstadiaController::class, 'verObservaciones_f05_Estadia'])
     ->name('obsevaciones_f05_estadia.index')
     ->middleware('auth');