<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
]);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', App\Http\Livewire\Home\Index::class)->name('home');


    Route::get('/category', App\Http\Livewire\Category\Index::class)->name('category.index');
    Route::get('/product', App\Http\Livewire\Product\Index::class)->name('product.index');
    Route::get('/product/create', App\Http\Livewire\Product\Create::class)->name('product.create');
    Route::get('/product/detail/{id}', App\Http\Livewire\Product\Detail::class)->name('product.detail');
});
