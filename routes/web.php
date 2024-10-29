<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
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

Route::get("/user", [UserController::class, "index"])->name("user.index");
Route::get("/user/create", [UserController::class, "indexcreate"])->name("user.create");
Route::get("/user/update/{id}", [UserController::class, "indexupdate"])->name("user.indexupdate");
Route::get("/user/show/{id}", [UserController::class, "show"])->name("user.show");

Route::post("/user/store", [UserController::class, "store"])->name("user.store");
Route::post("/user/update/{id}", [UserController::class, "update"])->name("user.update");
Route::post("/user/delete/{id}", [UserController::class, "delete"])->name("user.delete");

Route::get("/client", [ClientController::class, "index"])->name("client.index");
Route::get("/client/create", [ClientController::class, "indexcreate"])->name("client.create");
Route::get("/client/update/{id}", [ClientController::class, "indexupdate"])->name("client.indexupdate");
Route::get("/client/show/{id}", [ClientController::class, "show"])->name("client.show");

Route::post("/client/store", [ClientController::class, "store"])->name("client.store");
Route::post("/client/update/{id}", [ClientController::class, "update"])->name("client.update");
Route::post("/client/delete/{id}", [ClientController::class, "delete"])->name("client.delete");

Route::get("/purchase", [PurchaseController::class, "index"])->name("purchase.index");
Route::get("/purchase/create", [PurchaseController::class, "indexcreate"])->name("purchase.create");
Route::get("/purchase/update/{id}", [PurchaseController::class, "indexupdate"])->name("purchase.indexupdate");
Route::get("/purchase/show/{id}", [PurchaseController::class, "show"])->name("purchase.show");

Route::post("/purchase/store", [PurchaseController::class, "store"])->name("purchase.store");
Route::post("/purchase/update/{id}", [PurchaseController::class, "update"])->name("purchase.update");
Route::post("/purchase/delete/{id}", [PurchaseController::class, "delete"])->name("purchase.delete");

Route::get("/point", [PointController::class, "index"])->name("point.index");
Route::get("/point/create", [PointController::class, "indexcreate"])->name("point.create");
Route::get("/point/update/{id}", [PointController::class, "indexupdate"])->name("point.indexupdate");
Route::get("/point/show/{id}", [PointController::class, "show"])->name("point.show");

Route::post("/point/store", [PointController::class, "store"])->name("point.store");
Route::post("/point/update/{id}", [PointController::class, "update"])->name("point.update");
Route::post("/point/delete/{id}", [PointController::class, "delete"])->name("point.delete");

Route::get("/category", [CategoryController::class, "index"])->name("category.index");
Route::get("/category/create", [CategoryController::class, "indexcreate"])->name("category.create");
Route::get("/category/update/{id}", [CategoryController::class, "indexupdate"])->name("category.indexupdate");
Route::get("/category/show/{id}", [CategoryController::class, "show"])->name("category.show");

Route::post("/category/store", [CategoryController::class, "store"])->name("category.store");
Route::post("/category/update/{id}", [CategoryController::class, "update"])->name("category.update");
Route::post("/category/delete/{id}", [CategoryController::class, "delete"])->name("category.delete");

Route::get("/region", [RegionController::class, "index"])->name("region.index");
Route::get("/region/create", [RegionController::class, "indexcreate"])->name("region.create");
Route::get("/region/show/{id}", [RegionController::class, "show"])->name("region.show"); 
Route::get("/region/update/{id}", [RegionController::class, "indexupdate"])->name("region.indexupdate");

Route::post("/region/store", [RegionController::class, "store"])->name("region.store");
Route::post("/region/update/{id}", [RegionController::class, "update"])->name("region.update");
Route::post("/region/delete/{id}", [RegionController::class, "delete"])->name("region.delete");

Route::get("/product", [ProductController::class, "index"])->name("product.index");
Route::get("/product/create", [ProductController::class, "indexcreate"])->name("product.create");
Route::get("/product/update/{id}", [ProductController::class, "indexupdate"])->name("product.indexupdate");
Route::get("/product/show/{id}", [ProductController::class, "show"])->name("product.show");

Route::post("/product/store", [ProductController::class, "store"])->name("product.store");
Route::post("/product/update/{id}", [ProductController::class, "update"])->name("product.update");
Route::post("/product/delete/{id}", [ProductController::class, "delete"])->name("product.delete");

Route::get("/company", [CompanyController::class, "index"])->name("company.index");
Route::get("/company/create", [CompanyController::class, "indexcreate"])->name("company.create");
Route::get("/company/update/{id}", [CompanyController::class, "indexupdate"])->name("company.indexupdate");
Route::get("/company/show/{id}", [CompanyController::class, "show"])->name("company.show");

Route::post("/company/store", [CompanyController::class, "store"])->name("company.store");
Route::post("/company/update/{id}", [CompanyController::class, "update"])->name("company.update");
Route::post("/company/delete/{id}", [CompanyController::class, "delete"])->name("company.delete");
