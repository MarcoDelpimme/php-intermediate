<?php

use App\Http\Controllers\ControllerProduct;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/details/{id}", [ControllerProduct::class, "details"])->name("details");
Route::get("/product", [ControllerProduct::class, "index"])->name("product");
Route::get("/create", [ControllerProduct::class, "create"])->name("create");
Route::get("/modify/{id}", [ControllerProduct::class, "modify"])->name("modify");
Route::delete("/delete/{id}", [ControllerProduct::class, "delete"])->name("delete");
Route::post("/store", [ControllerProduct::class, "store"])->name("store");
Route::put("/update/{id}", [ControllerProduct::class, "update"])->name("update");
