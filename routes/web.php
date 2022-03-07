<?php

use App\Http\Controllers\CedulaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
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

Route::get('/home', [CedulaController::class, 'ver'])
->name('home.index');

Route::post('/home', [CedulaController::class, 'store'])
    ->name('home.store');


Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::get('/usuarios', [UsuariosController::class, 'create'])
    ->name('usuarios.index');

//inicio
Route::get('/inicio', [InicioController::class, 'ver'])
->name('inicio.index');

//formato estancias
Route::match(['post','get'],'/estancia', [EstanciaController::class, 'ver'])
->name('estancia.index');

//descargar sin datos f03
Route::get('/descarga_sd_estancia_f03', [DescargaController::class, 'descarga_sd_estancia_f03'])
->name('descarga_sd_estancia_f03.index');

//descargar con datos f03
Route::get('/descarga_cd_f03', [PdfController::class, 'descarga_cd_f03'])
->name('descarga_cd_f03.index');

//eliminar f03 estancia
Route::match(['post', 'delete','put','get'],'/f03Estancia/{id_a}/{id_e}/{id_a_e}/{id_a_a}/{id_p}',[PdfController::class,'eliminarF03Estancia'])
->name('eliminar_f03');


//formatos estadias
Route::match(['post','get'],'/estadia', [EstadiaController::class, 'ver'])
->name('estadia.index');

//descargar sin datos f03
Route::get('/descarga_sd_estadia_f03', [DescargaController::class, 'descarga_sd_estadia_f03'])
->name('descarga_sd_estadia_f03.index');

//descargar con datos f03
Route::get('/descarga_cd_estadia_f03', [PdfController::class, 'descarga_cd_estadia_f03'])
->name('descarga_cd_estadia_f03.index');


//fallos
Route::match(['post','get'],'/errores', [falloController::class, 'ver'])
->name('fallos.index');

//eliminar f03
Route::match(['post', 'delete','put','get'],'/f03Estadia/{id_a}/{id_e}/{id_a_e}/{id_a_a}/{id_p}',[PdfController::class,'eliminarF03Estadia'])
->name('eliminar_f03Estadia.index');

//registro final

Route::match(['post','get'],'/registro_final', [falloController::class, 'verRegistroFinal'])
->name('registro_final.index');