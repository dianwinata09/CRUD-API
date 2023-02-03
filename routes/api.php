<?php

use App\Http\Controllers\API\siswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('siswa', [siswaController::class, 'index']);
Route::post('siswa/store', [siswaController::class, 'store']);
Route::get('siswa/show/{id}', [siswaController::class, 'show']);
Route::post('siswa/update/{id}', [siswaController::class, 'update']);
Route::get('siswa/destroy/{id}', [siswaController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
