<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ReporteDiagnosticoController;

//probablemente borrar este auth;
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
    return view('docente.index');
});

//---------------------------Rutas para la autenticacion
// Auth::routes(['register'=>false,'reset'=>false]);
Auth::routes(['reset'=>false]);  //este es para habilitar el registro pero oculta el reseteo de contraseña
Auth::routes(['register'=>false,'reset'=>false]); //de esta manera queda oculto el registro y el reseteo de contraseña


//---------------------------Rutas para el index docente
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [DocenteController::class, 'index'])->name('home');
    Route::get('/home', [DocenteController::class, 'index']);
    Route::get('docente/perfil', [DocenteController::class, 'show']);
    Route::resource('docente',DocenteController::class);
});


//---------------------------Rutas para los reportes
Route::group(['middleware'=>'auth'], function(){
    Route::get('reporte/index', [ReporteController::class, 'index']);
    Route::get('reporte/show', [ReporteController::class, 'show']);
    // Route::get('reporte/tipoReporte/reporteDiagnostico', [ReporteDiagnosticoController::class, 'create']);
    Route::resource('reporte', ReporteController::class);
});

Route::group(['middleware'=>'auth'], function(){
    // Route::get('reporte_diagnostico/', [ReporteDiagnosticoController::class, 'index']);
    Route::get('reporte_diagnostico/index', [ReporteDiagnosticoController::class, 'index']);
    Route::get('reporte_diagnostico/create', [ReporteDiagnosticoController::class, 'create']);
    Route::resource('reporte_diagnostico', ReporteDiagnosticoController::class);
});

Route::group(['middleware'=>'auth'], function(){
    // Route::get('reporte_diagnostico/', [ReporteDiagnosticoController::class, 'index']);
    Route::get('infoUser/index', [InfoUserController::class, 'index']);
    Route::get('infoUser/create', [InfoUserController::class, 'create']);
    // Route::get('info_user/edit', [InfoUserController::class, 'edit']);
    Route::resource('infoUser', InfoUserController::class);
});
Route::resource('infoUser', InfoUserController::class);

//---------------------------Rutas para los reportes
Route::get('/get-all-reportes', [PdfController::class, 'getAllPdfController'])->middleware('auth');
Route::get('/downloadPDF', [PdfController::class, 'downloadPDF'])->middleware('auth');