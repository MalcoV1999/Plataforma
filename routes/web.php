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
Route::resource("user", UserController::class);
Route::get("/user/create", [UserController::class, "create"])->name(
    "user.create"
);

Route::post("/user/{id}/assign-role", [
    UserController::class,
    "assignRole",
])->name("user.assignRole");

// Ruta de inicio
Route::get("/", [HomeController::class, "index"])->name("home");

// Test de roles
Route::get("/test-role", [AdminController::class, "testRole"])
    ->middleware(["auth", "role:superadmin"])
    ->name("test-role");

// Asignación de roles
Route::post("/assign-role", [RoleController::class, "assignRole"])
    ->middleware("auth")
    ->name("assign-role");

// Dashboard General
Route::get("/dashboard", function () {
    return view("dashboard");
})
    ->middleware(["auth", "verified", "role:superadmin,admin,assistant"])
    ->name("dashboard");

// Perfil general
Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );
});

// Rutas dinámicas para roles
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
        Route::get("/", [BuyerController::class, "home"])->name("buyer.home");
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

// Login público agrupado
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
    Route::resource("user", UserController::class);
    Route::resource("client", ClientController::class);
    Route::resource("purchase", PurchaseController::class);
    Route::resource("point", PointController::class);
    Route::resource("category", CategoryController::class);
    Route::resource("region", RegionController::class);
    Route::resource("product", ProductController::class);
    Route::resource("company", CompanyController::class);
});

// Autenticación de Laravel Breeze/Jetstream
require __DIR__ . "/auth.php";
