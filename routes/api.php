<?php

use App\Http\Controllers\Api\MovieController as ApiMovieController;
use App\Http\Controllers\MovieController;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/movies', function(Request $request){
    return Movie::all();
});



Route::get('/movies', [ApiMovieController::class, 'index']);
Route::get('/movies/{id}', [ApiMovieController::class, 'show']);
Route::post('/movies', [ApiMovieController::class, 'store']);
Route::put('/movies/{id}', [ApiMovieController::class, 'update']);
Route::delete('/movies/{id}', [ApiMovieController::class, 'destroy']);
//Route::get('/movies/{id}/reviews', [ApiMovieController::class, 'getReviews']);





