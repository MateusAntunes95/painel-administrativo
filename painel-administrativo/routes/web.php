<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AlbumController,
    ClienteController,
    TipoAcessoController,
    UserController,
    RelatoriosController,
    HomeController,
    LoginController,
};

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
Route::get('/', function () { return redirect()->route('home'); });
Route::resource('tipo_acesso', TipoAcessoController::class);
Route::resource('user', UserController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('album', AlbumController::class);

Route::get('album/preenche_perfil/{id}', [AlbumController::class, 'preenchePerfil']);
Route::get('albuns_versos_clientes', [RelatoriosController::class, 'index']);
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');
