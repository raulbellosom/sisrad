<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PdfController;
use App\Models\Reporte;

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
    return view('auth.login');
});

// Route::get('/docente', function () {
//     return view('docente.index');
// });

// Route::get("docente/create", [DocenteController::class,"create"]);

Route::resource('docente',DocenteController::class)->middleware('auth');
// Auth::routes(['register'=>false,'reset'=>false]);
// Auth::routes(['reset'=>false]);

Route::get('/home', [DocenteController::class, 'index'])->middleware('auth');

if('auth'=='true'){
    Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [DocenteController::class, 'index'])->name('home');
});
}else{
    Route::get('/', [PdfController::class, 'guest']);
}

//Rutas para los reportes
Route::resource('reporte', ReporteController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/get-all-reportes', [PdfController::class, 'getAllPdfController'])->middleware('auth');

Route::get('/downloadPDF', [PdfController::class, 'downloadPDF'])->middleware('auth');