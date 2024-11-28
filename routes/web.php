<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('produtos', [ProdutoController::class, 'index'])->midleware(['auth', 'verified'])->name('index-produtos');
Route::get('produtos/create', [ProdutoController::class, 'create'])->midleware(['auth', 'verified'])->name('create-produtos');
Route::post('produtos', [ProdutoController::class, 'store'])->midleware(['auth', 'verified'])->name('store-produtos');
Route::get('produtos/{id}/edit', [ProdutoController::class, 'edit'])->midleware(['auth', 'verified'])->name('edit-produtos');
Route::put('produtos/{id}', [ProdutoController::class, 'update'])->midleware(['auth', 'verified'])->name('update-produtos');
Route::delete('produtos/{id}', [ProdutoController::class, 'destroy'])->midleware(['auth', 'verified'])->name('destroy-produtos');

Route::get('categorias', [CategoriaController::class, 'index'])->midleware(['auth', 'verified'])->name('index-categorias');
Route::get('categorias/create', [CategoriaController::class, 'create'])->midleware(['auth', 'verified'])->name('create-categorias');
Route::post('categorias', [CategoriaController::class, 'store'])->midleware(['auth', 'verified'])->name('store-categorias');
Route::get('categorias/{id}/edit', [CategoriaController::class, 'edit'])->midleware(['auth', 'verified'])->name('edit-categorias');
Route::put('categorias/{id}', [CategoriaController::class, 'update'])->midleware(['auth', 'verified'])->name('update-categorias');
Route::delete('categorias/{id}', [CategoriaController::class, 'destroy'])->midleware(['auth', 'verified'])->name('destroy-categorias');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
