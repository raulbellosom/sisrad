<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PdfController;

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

// Auth::routes(['register'=>false,'reset'=>false]);
Auth::routes(['reset'=>false]);  //este es para habilitar el registro pero oculta el reseteo de contraseña
Auth::routes(['register'=>false,'reset'=>false]); //de esta manera queda oculto el registro y el reseteo de contraseña

// Route::get('/docente', function () {
//     return view('docente.index');
// });

// Route::get("docente/create", [DocenteController::class,"create"]);

// Route::resource('reporte',ReporteController::class)->middleware('auth');
Route::group(['middleware'=>'auth'], function(){
    // Route::resource('reporte',ReporteController::class);
   
    Route::get('reporte/index', [ReporteController::class, 'index']);
    Route::get('reporte/create', [ReporteController::class, 'create']);
    Route::get('reporte/show', [ReporteController::class, 'show']);
    Route::resource('reporte', ReporteController::class);
});


Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [DocenteController::class, 'index'])->name('home');
    Route::get('/home', [DocenteController::class, 'index']);
});
Route::resource('docente',DocenteController::class)->middleware('auth');
// Route::group(['middleware'=>'auth'], function(){
//     Route::get('index', [ReporteController::class, 'index'])->name('main');
//     Route::get('show', [ReporteController::class, 'show'])->name('show');
// });

// Route::get('/', [PdfController::class, 'guest'])->name('home');
// if(Auth::check()){
//     Route::group(['middleware'=>'auth'], function(){
//     Route::get('/', [DocenteController::class, 'index'])->name('home');
// });
// }else{
//     Route::get('/', [PdfController::class, 'guest'])->name('home');
// }

//Rutas para los reportes

Route::get('/get-all-reportes', [PdfController::class, 'getAllPdfController'])->middleware('auth');

Route::get('/downloadPDF', [PdfController::class, 'downloadPDF'])->middleware('auth');