<?php

use App\Http\Controllers\CedulaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\definicion_proyectoController;
use App\Http\Controllers\definicionController;
use App\Http\Controllers\documentosEstanciaAdminController;
use App\Http\Controllers\EstadiaController;
use App\Http\Controllers\EstanciaController;
use App\Http\Controllers\falloController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UsuariosController;
use App\Models\Formulario;

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
    return view('auth.login');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');



Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

//admin
    //dashboard
    Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

    //
     Route::get('/usuarios', [UsuariosController::class, 'create'])
    ->name('usuarios.index');

    Route::match(['post','get'],'/estancia_Documentos', [documentosEstanciaAdminController::class, 'ver'])
    ->name('documentoEstanciaAdmin.index');

     //ver con datos f03
     Route::match(['post','get'],'/ver_cd_estancia_f03/{id}/{name}', [documentosEstanciaAdminController::class, 'ver_cd_estancia_f03'])
     ->name('ver_cd_estancia_f03.index');

        //ver con datos f03
        Route::match(['post','get'],'/ver_cd_estancia_f03/admin/{id}/{name}', [documentosEstanciaAdminController::class, 'ver_cd_estancia_f03_admin'])
        ->name('ver_cd_estancia_f03_admin.index');
//alumno
   

//inicio
Route::get('/inicio', [InicioController::class, 'ver'])
->name('inicio.index');

//formato estancias
    Route::match(['post','get'],'/estancia', [EstanciaController::class, 'ver'])
    ->name('estancia.index');

    //descargar con datos f02
    Route::get('/descarga_cd_estancia_f01', [PdfController::class, 'descarga_cd_f01_estancia'])
    ->name('descarga_cd_estancia_f01.index');

    //descargar con datos f02
    Route::get('/descarga_cd_estancia_f02', [PdfController::class, 'descarga_cd_f02_estancia'])
    ->name('descarga_cd_estancia_f02.index');

    //llenar f03
    Route::get('/home', [CedulaController::class, 'ver'])
    ->name('home.index');
    
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
    Route::match(['post', 'delete','put'], '/f03/{id_d}/{nombre}',[PdfController::class,'cancelarF03'])
    ->name('cancelar_f03.index');
    

    //llenar datos f04
    Route::get('/usuario/f04-definicion_de_proyecto', [definicionController::class, 'ver'])
    ->name('f04Formulario.index');

    //guardar f04
    Route::post('/usuario/f04-definicion_de_proyecto', [definicion_proyectoController::class, 'store'])
    ->name('f04Guardar.index');

    //eliminar f04
    Route::match(['post', 'delete','put','get'],'/f04/{id_a}/{id_a_e}/{id_p}/{id_d}',[PdfController::class,'eliminarF04'])
    ->name('eliminar_f04.index');

    //descargar f04 con datos
    Route::get('/descarga_cd_estacia_f04', [PdfController::class, 'descarga_cd_estancia_f04'])
    ->name('descarga_cd_estancia_f04.index');

    //descargar f05 con datos
    Route::get('/descarga_cd_estacia_f05', [PdfController::class, 'descarga_cd_estancia_f05'])
    ->name('descarga_cd_estancia_f05.index');

//formatos estadias
    Route::match(['post','get'],'/estadia', [EstadiaController::class, 'ver'])
    ->name('estadia.index');

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

//fallos
    Route::match(['post','get'],'/errores', [falloController::class, 'ver'])
    ->name('fallos.index');

    

    //registro final cedula f03

    Route::match(['post','get'],'/registro_final_cedula', [falloController::class, 'verRegistroFinalCedula'])
    ->name('registro_final_cedula.index');


    //registro final definicion f04
    Route::match(['post','get'],'/registro_final_definicion', [falloController::class, 'verRegistroFinalDefinicion'])
    ->name('registro_final_definicion.index');


    
    //Ver Observaciones del admin vista usuario
    Route::match(['post','get'],'/observaciones', [EstanciaController::class, 'verObservaciones_f03'])
    ->name('obsevaciones_f03.index');