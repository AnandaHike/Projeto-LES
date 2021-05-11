<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

//  ADMIN
Route::group(["prefix" => "/admin", "as" => "admin."], function () {

  //  AUTH
  Route::group(["as" => "auth."], function () {

    //  LOGIN
    Route::get("/login", [LoginController::class, "login"])->name("login");
    Route::post("/login", [LoginController::class, "authenticate"])->name("authenticate");

    // LOGOUT
    Route::get("/logout", [LoginController::class, "logout"])->name("logout");

    //  FORGOT PASSWORD
    Route::get("/recuperar-senha", [UserController::class, "forgot"])->name("forgot");
    Route::get("/recuperar-senha/2", [UserController::class, "forgot2"])->name("forgot-2");
    Route::get("/recuperar-senha/3", [UserController::class, "forgot3"])->name("forgot-3");
    Route::post("/recuperar-senha", [UserController::class, "resetPassword"])->name("reset-password");

    // REGISTER
    Route::get("/criar-conta", [UserController::class, "create"])->name("create");
    Route::post("/criar-conta", [UserController::class, "store"])->name("store");

    //  MY ACCOUNT
    Route::get("/minha-conta", [UserController::class, 'show'])->name("show");
    Route::post("/minha-conta", [UserController::class, 'update'])->name("update");
  });

  // DASHBOARD
  Route::group(["as" => "dashboard.", "middleware" => "auth"], function () {
    Route::get("/", function () {
      return redirect()->route('admin.dashboard.schedule.index');
    })->name("index");

    //  USERS
    Route::group(["prefix" => "usuarios", "as" => "users."], function () {
      Route::get("/", [UserController::class, "index"])->name("index");
      Route::get("/cadastrar", [UserController::class, "create"])->name("create");
      Route::get("/editar/{id}", [UserController::class, "edit"])->name("edit");
      Route::put("/editar/{id}", [UserController::class, "update"])->name("update");
      Route::delete("/deletar/{id}", [UserController::class, "destroy"])->name("destroy");
    });

    //  CLIENTS
    Route::group(["prefix" => "clientes", "as" => "clients."], function () {
      Route::get("/", [UserController::class, "index"])->name("index");
      Route::get("/cadastrar", [UserController::class, "create"])->name("create");
      Route::get("/editar/{id}", [UserController::class, "editClient"])->name("edit");
      Route::delete("/deletar/{id}", [UserController::class, "destroy"])->name("destroy");
    });

    //  SERVICES
    Route::group(["prefix" => "servicos", "as" => "services."], function () {
      Route::get("/", [ServiceController::class, "index"])->name("index");
      Route::get("/cadastrar", [ServiceController::class, "create"])->name("create");
      Route::post("/cadastrar", [ServiceController::class, "store"])->name("store");

      Route::get("/editar/{id}", [ServiceController::class, "edit"])->name("edit");
      Route::post("/editar/{id}", [ServiceController::class, "update"])->name("update");

      Route::delete("/deletar/{id}", [ServiceController::class, "destroy"])->name("destroy");
    });

    //  SCHEDULE
    Route::group(["prefix" => "agenda", "as" => "schedule."], function () {
      Route::get("/", [ScheduleController::class, 'index'])->name("index");
      Route::get("/cadastrar", [ScheduleController::class, 'create'])->name("create");
      Route::post("/cadastrar", [ScheduleController::class, 'store'])->name("store");
      Route::get("/editar/{id}", [ScheduleController::class, 'edit'])->name("edit");
      Route::post("/editar/{id}", [ScheduleController::class, 'update'])->name("update");
      Route::delete("/editar/{id}", [ScheduleController::class, 'destroy'])->name("destroy");
    });
  });
});

Route::get("/", [ServiceController::class, 'homeSite']);