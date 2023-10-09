<?php

use App\Http\Controllers\myproductcontroller;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [myproductcontroller::class,'allproducts'])->name('product.index');
Route::get('/addproduct', [myproductcontroller::class,'createproduct'])->name('addproduct');   
Route::post('/productstore', [myproductcontroller::class,'productstore'])->name('productstore');
Route::get('/allproducts', [myproductcontroller::class,'allproducts'])->name('allproducts');
Route::get('/editproduct/{id}/edit', [myproductcontroller::class,'editproduct'])->name('editproduct');  
Route::put('/myeditproduct/{id}', [myproductcontroller::class,'myeditproduct'])->name('myeditproduct');  
Route::get('/deleteproduct/{id}/delete', [myproductcontroller::class,'deleteproduct'])->name('deleteproduct');