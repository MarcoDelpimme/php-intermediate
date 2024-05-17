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

Route::get("/delete/{id}", [ControllerProduct::class, "delete"])->name("delete");
