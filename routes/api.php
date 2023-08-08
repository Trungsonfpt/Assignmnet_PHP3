<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiStudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('student')->group(function (){
    Route::get('/',[ApiStudentController::class,'index']);  // Lấy ra danh sách
    Route::post('/',[ApiStudentController::class,'store']); // Thêm
    Route::get('/{id}',[ApiStudentController::class,'show']); // Lấy ra thông tin sửa
    Route::put('/{id}',[ApiStudentController::class,'update']); // Sửa
    Route::delete('/{id}',[ApiStudentController::class,'destroy']); //Xóa
});
