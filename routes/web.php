<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/categories',[CategorieController::class,"index"])->name("categories.index");
Route::get("/categories/create",[CategorieController::class,"create"])->name("categories.create");
Route::post("/categories",[CategorieController::class,"store"])->name("categories.store");
Route::get("/categories/{id}",[CategorieController::class,"show"])->name("categories.show");
Route::get("/categories/{id}/edit",[CategorieController::class,"edit"])->name("categories.edit");
Route::put("/categories/{id}",[CategorieController::class,"update"])->name("categories.update");
Route::delete("/categories/{id}",[CategorieController::class,"destroy"])->name("categories.destroy");
// Route::resource("categories",CategorieController::class);

Route::get("/clients",[ClientController::class,"index"])->name("clients.index");
Route::get("/clients/create",[ClientController::class,"create"])->name("clients.create");
Route::post("/clients",[ClientController::class,"store"])->name("clients.store");
Route::get("/clients/{id}",[ClientController::class,"show"])->name("clients.show");
Route::get("/clients/{id}/edit",[ClientController::class,"edit"])->name("clients.edit");
Route::put("/clients/{id}",[ClientController::class,"update"])->name("clients.update");
Route::delete("/clients/{id}",[ClientController::class,"destroy"])->name("clients.destroy");

Route::resource("produits",ProduitController::class);

Route::resource("commands",CommandController::class);

Route::get('/produits/filter/{categorie_id}', [ProduitController::class, 'filterByCategorie']);

Route::get('/commands/filter/{etat?}', [CommandController::class, 'filterByEtat']);

Route::get("/home",[HomeController::class,"index"])->name("home");

Route::post('add-to-cart/{produit}', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('cart', [CartController::class, 'cart'])->name('cart.index');

Route::delete('remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::post('clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');