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
Route::get("/articles/create", [musicController::class, "create"]);
Route::post("/articles", [musicController::class, "store"]);
Route::get("/articles/{article}/edit", [musicController::class, "edit"]);
Route::post("/articles/{article}", [musicController::class, "update"]);
