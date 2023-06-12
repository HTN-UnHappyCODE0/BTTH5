<?php

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
    return view('welcome');
});


Route::get("/articles", [musicController::class, "index"]);
Route::post("/articles", [musicController::class, "store"])->name('articles.store');
Route::get("/articles/create", [musicController::class, "create"]);
