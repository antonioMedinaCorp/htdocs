<?php

use App\Http\Controllers\FrutaController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('layout', function(){
    return view('contactos.layout');
});

Route::prefix('fruteria')->group(function (){
    Route::get('frutas', [FrutaController::class, 'index'])->name('frutas');
    Route::post('frutas', [FrutaController::class, 'recibirFormulario'])->name('recibir');
    Route::get('naranjas', [FrutaController::class, 'naranjas']);
    Route::get('peras', [FrutaController::class, 'peras'])->name('peras');

});
