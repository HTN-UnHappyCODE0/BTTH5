<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\musicController;

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
    return view('article.index');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get("/article", [musicController::class, "index"]);
Route::get("/article/create", [musicController::class, "create"]);
Route::post("/article", [musicController::class, "store"])->middleware('auth');
Auth::routes();

Route::get('article/index', [App\Http\Controllers\HomeController::class, 'index'])->name('article');