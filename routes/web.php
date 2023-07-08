<?php

use App\Http\Controllers\CrudController;
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

Route::get('/' , [CrudController::class , 'index'])->name('index');
Route::get('/create' , [CrudController::class , 'create'])->name('create');
Route::get('/show/{crud}' , [CrudController::class , 'show'])->name('show');
Route::post('/store' , [CrudController::class , 'store'])->name('store');
Route::get('/edit/{crud}',  [CrudController::class, 'edit'])->name('edit');
Route::put('/update/{crud}',  [CrudController::class, 'update'])->name('update');
Route::delete('/delete/{crud}' , [CrudController::class , 'destroy'])->name('destroy');