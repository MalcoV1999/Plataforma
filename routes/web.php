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
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// Página de inicio
Route::get("/", [HomeController::class, "index"])->name("home");

// Asignación de roles a usuarios
Route::post("/assign-role", [RoleController::class, "assignRole"])
    ->middleware("auth")
    ->name("assign-role");

// Usuarios
Route::middleware("auth")->group(function () {
    Route::resource("user", UserController::class);
    Route::get("/user/create", [UserController::class, "create"])->name(
        "user.create"
    );
    Route::post("/user/{id}/assign-role", [
        UserController::class,
        "assignRole",
    ])->name("user.assignRole");
});

// Dashboard General basado en roles
Route::get("/dashboard", function () {
    return view("dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

// Rutas dinámicas por roles
Route::middleware(["auth", "role:superadmin"])
    ->prefix("superadmin")
    ->group(function () {
        Route::get("/dashboard", [
            SuperadminController::class,
            "dashboard",
        ])->name("superadmin.dashboard");
        Route::get("/profile", [
            SuperadminProfileController::class,
            "index",
        ])->name("superadmin.profile");
        Route::post("/profile/update", [
            SuperadminProfileController::class,
            "updateProfile",
        ])->name("superadmin.profile.update");
        Route::post("/profile/update/password", [
            SuperadminProfileController::class,
            "updatePassword",
        ])->name("superadmin.password.update");
    });

Route::middleware(["auth", "role:admin"])
    ->prefix("admin")
    ->group(function () {
        Route::get("/dashboard", [AdminController::class, "dashboard"])->name(
            "admin.dashboard"
        );
        Route::get("/profile", [AdminProfileController::class, "index"])->name(
            "admin.profile"
        );
        Route::post("/profile/update", [
            AdminProfileController::class,
            "updateProfile",
        ])->name("admin.profile.update");
        Route::post("/profile/update/password", [
            AdminProfileController::class,
            "updatePassword",
        ])->name("admin.password.update");
    });

Route::middleware(["auth", "role:assistant"])
    ->prefix("assistant")
    ->group(function () {
        Route::get("/dashboard", [
            AssistantController::class,
            "dashboard",
        ])->name("assistant.dashboard");
        Route::get("/profile", [
            AssistantProfileController::class,
            "index",
        ])->name("assistant.profile");
        Route::post("/profile/update", [
            AssistantProfileController::class,
            "updateProfile",
        ])->name("assistant.profile.update");
        Route::post("/profile/update/password", [
            AssistantProfileController::class,
            "updatePassword",
        ])->name("assistant.password.update");
    });

Route::middleware(["auth", "role:buyer"])
    ->prefix("buyer")
    ->group(function () {
        Route::get("/dashboard", [BuyerController::class, "dashboard"])->name(
            "buyer.dashboard"
        );
        Route::get("/profile", [BuyerProfileController::class, "index"])->name(
            "buyer.profile"
        );
        Route::post("/profile/update", [
            BuyerProfileController::class,
            "updateProfile",
        ])->name("buyer.profile.update");
        Route::post("/profile/update/password", [
            BuyerProfileController::class,
            "updatePassword",
        ])->name("buyer.password.update");
    });

// Login público
Route::prefix("login")->group(function () {
    Route::get("admin", [AdminController::class, "login"])->name("admin.login");
    Route::get("superadmin", [SuperadminController::class, "login"])->name(
        "superadmin.login"
    );
    Route::get("assistant", [AssistantController::class, "login"])->name(
        "assistant.login"
    );
    Route::get("buyer", [BuyerController::class, "login"])->name("buyer.login");
});

// CRUD agrupado
Route::middleware("auth")->group(function () {
    Route::resource("client", ClientController::class);
    Route::resource("purchase", PurchaseController::class);
    Route::resource("point", PointController::class);
    Route::resource("category", CategoryController::class);
    Route::resource("region", RegionController::class);
    Route::resource("product", ProductController::class);
    Route::resource("company", CompanyController::class);
});

// Laravel Breeze/Jetstream Auth
require __DIR__ . "/auth.php";
