<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
Route::get('prueba', [Controller::class, 'PruebaTecnica']);
Route::get('savedatos', [Controller::class, 'GuardarDatos']);
Route::post('editar', [Controller::class, 'EditarRegistros']);
Route::get('verregistros', [Controller::class, 'VerDatos']);

