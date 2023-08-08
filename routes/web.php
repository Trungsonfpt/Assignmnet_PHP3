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
Route::get('/student',[App\Http\Controllers\StudentController::class,'list'])->name('homepage') ;
Route::post('/student',[App\Http\Controllers\StudentController::class,'list'])->name('search-StudentRequest');
Route::match(['GET','POST'],'/add',[App\Http\Controllers\StudentController::class,'add'])->name('add-StudentRequest');
Route::match(['GET','POST'],'/edit/{id}',[App\Http\Controllers\StudentController::class,'edit'])->name('edit-StudentRequest');
Route::get('/delete/{id}',[App\Http\Controllers\StudentController::class,'delete_stu'])->name('delete-StudentRequest');
