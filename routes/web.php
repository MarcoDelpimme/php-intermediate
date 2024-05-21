<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerProduct;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//Rotte accessibili solo se autenticati e verificati
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get("/product", [ControllerProduct::class, "index"])->name("product");
    Route::get("/create", [ControllerProduct::class, "create"])->name("create");
    Route::get("/modify/{id}", [ControllerProduct::class, "modify"])->name("modify");
    Route::delete("/delete/{id}", [ControllerProduct::class, "delete"])->name("delete");
    Route::post("/store", [ControllerProduct::class, "store"])->name("store");
    Route::put("/update/{id}", [ControllerProduct::class, "update"])->name("update");
});

//Accessibili senza la verifica
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Accessibili da tutti 
Route::get("/product", [ControllerProduct::class, "index"])->name("product");
Route::get("/details/{id}", [ControllerProduct::class, "details"])->name("details");
require __DIR__ . '/auth.php';
