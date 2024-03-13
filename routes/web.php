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

// Para ingresar a un método
//Route::get('/post',[PostController::class,'index']);

// Forma de ingresar a todas las rutas
Route::resource('post', PostController::Class)->middleware('auth');


Auth::routes();

Route::get('/home', [PostController::class, 'index'])->name('home');  

Route::group(['middleware' => 'auth'], function () {
    //Route::get('/home', [PostController::class, 'index'])->name('home');  // Redirecciona
    Route::get('/home',[PostController::class,'index'])->name('home');
    Route::get('/add', [PostController::class, 'create'])->name('newPost');
});