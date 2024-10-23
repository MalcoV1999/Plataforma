<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/client", [ClientController::class, "index"])->name("client.index");
Route::get("/client/create", [ClientController::class, "indexcreate"])->name("client.create");
Route::get("/client/update/{id}", [ClientController::class, "indexupdate"])->name("client.indexupdate");
Route::get("/client/show", [ClientController::class, "indexshow"])->name("client.show");

Route::post("/client/store", [ClientController::class, "store"])->name("client.store");
Route::post("/client/update/{id}", [ClientController::class, "update"])->name("client.update");
Route::post("/client/delete/{id}", [ClientController::class, "delete"])->name("client.delete");

