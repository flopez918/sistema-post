<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});

// Forma de acceder a todas las URLs del controlador respetando la autenticación
Route::resource('post', PostController::Class)->middleware('auth');

// Creará algunas rutas por defecto
Auth::routes();

// Rutas que se utilizan cuando se loguea
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home',[PostController::class,'index'])->name('home');
    Route::get('/add', [PostController::class, 'create'])->name('newPost');
});