<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AssistantController;
use App\Http\Controllers\Backend\AssistantProfileController;
use App\Http\Controllers\Backend\BuyerController;
use App\Http\Controllers\Backend\BuyerProfileController;
use App\Http\Controllers\Backend\SuperadminController;
use App\Http\Controllers\Backend\SuperadminProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/superadmin/profile', [SuperadminProfileController::class, 'index'])->name('superadmin.profile');
    Route::post('/superadmin/profile/update', [SuperadminProfileController::class, 'updateProfile'])->name('superadmin.profile.update');
    Route::post('/superadmin/profile/update/password', [SuperadminProfileController::class, 'updatePassword'])->name('superadmin.password.update');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/admin/profile/update/password', [AdminProfileController::class, 'updatePassword'])->name('admin.password.update');
});

Route::middleware(['auth', 'role:assistant'])->group(function () {
    Route::get('/assistant/dashboard', [AssistantController::class, 'dashboard'])->name('assistant.dashboard');
    Route::get('/assistant/profile', [AssistantProfileController::class, 'index'])->name('assistant.profile');
    Route::post('/assistant/profile/update', [AssistantProfileController::class, 'updateProfile'])->name('assistant.profile.update');
    Route::post('/assistant/profile/update/password', [AssistantProfileController::class, 'updatePassword'])->name('assistant.password.update');
});

Route::middleware(['auth', 'role:buyer'])->group(function () {
    Route::get('/buyer/dashboard', [BuyerController::class, 'dashboard'])->name('buyer.dashboard');
    Route::get('/buyer/profile', [BuyerProfileController::class, 'index'])->name('buyer.profile');
    Route::post('/buyer/profile/update', [BuyerProfileController::class, 'updateProfile'])->name('buyer.profile.update');
    Route::post('/buyer/profile/update/password', [BuyerProfileController::class, 'updatePassword'])->name('buyer.password.update');
});

Route::get('admin/login',[AdminController::class, 'login']) ->name('admin.login');
Route::get('superadmin/login',[SuperadminController::class, 'login']) ->name('superadmin.login');
Route::get('assistant/login',[AssistantController::class, 'login']) ->name('assistant.login');
Route::get('buyer/login',[AssistantController::class, 'login']) ->name('buyer.login');


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



