<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(["auth"])->group(function () {
    Route::view('/home', "home")->name("home");
    Route::prefix("vehicles")->name("vehicles.")->group(function () {
        Route::get("", [VehicleController::class, 'index'])->name("index");
        Route::get("show/{vehicle}", [VehicleController::class, 'show'])->name("show");
        Route::get("create", [VehicleController::class, 'create'])->name("create");
        Route::post("store", [VehicleController::class, 'store'])->name("store");
        Route::get("edit/{vehicle}", [VehicleController::class, 'edit'])->name("edit");
        Route::put("update/{vehicle}", [VehicleController::class, 'update'])->name("update");
        Route::get("search", [VehicleController::class, 'search'])->name("search");
        Route::get("results", [VehicleController::class, 'results'])->name("results");
        Route::get('delete/{vehicle}', [VehicleController::class, 'destroy'])->name("delete");
    });

    Route::prefix("companies")->name("companies.")->group(function () {
        Route::get("", [CompanyController::class, 'index'])->name("index");
        Route::get("show/{company}", [CompanyController::class, 'show'])->name("show");
        Route::get("create", [CompanyController::class, 'create'])->name("create");
        Route::post("store", [CompanyController::class, 'store'])->name("store");
        Route::get("edit/{company}", [CompanyController::class, 'edit'])->name("edit");
        Route::put("update/{company}", [CompanyController::class, 'update'])->name("update");
        Route::get("search", [CompanyController::class, 'search'])->name("search");
        Route::get("results", [CompanyController::class, 'results'])->name("results");
        Route::get('delete/{company}', [CompanyController::class, 'destroy'])->name("delete");
    });

    Route::prefix("orders")->name("orders.")->group(function () {
        Route::get("", [OrderController::class, 'index'])->name("index");
        Route::get("show/{order}", [OrderController::class, 'show'])->name("show");
        Route::get("create", [OrderController::class, 'create'])->name("create");
        Route::post("store", [OrderController::class, 'store'])->name("store");
        Route::put("update/{order}", [OrderController::class, 'update'])->name("update");
        Route::get("results", [OrderController::class, 'results'])->name("results");
        Route::get('delete/{order}', [OrderController::class, 'destroy'])->name("delete");
        Route::get('deliver/{order}', [OrderController::class, 'deliver'])->name("deliver");
    });

    Route::prefix("users")->name("users.")->group(function () {
        Route::get("", [UsersController::class, 'index'])->name("index");
        Route::get("show/{user}", [UsersController::class, 'show'])->name("show");
        Route::get("create", [UsersController::class, 'create'])->name("create");
        Route::post("store", [UsersController::class, 'store'])->name("store");
        Route::get("edit/{user}", [UsersController::class, 'edit'])->name("edit");
        Route::put("update/{user}", [UsersController::class, 'update'])->name("update");
        Route::get("results", [UsersController::class, 'results'])->name("results");
        Route::get('delete/{user}', [UsersController::class, 'destroy'])->name("delete");
    });
});
