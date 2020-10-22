<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\PageController@index')->name('index');

Route::post('addCategory',  'App\Http\Controllers\PageController@addCategory')->name('addCategory');
Route::post('deleteCategory', 'App\Http\Controllers\PageController@deleteCategory')->name('deleteCategory');
Route::post('loadCatDeleteModal', 'App\Http\Controllers\PageController@loadCatDeleteModal')->name('loadCatDeleteModal');
Route::post('editCategory', 'App\Http\Controllers\PageController@editCategory')->name('editCategory');
Route::post('loadCatEditModal', 'App\Http\Controllers\PageController@loadCatEditModal')->name('loadCatEditModal');



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
