<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('books', [BookController::class, 'getAllBooks']);
Route::get('books/{id}', [BookController::class, 'getBook']);
Route::post('book', [BookController::class, 'createBook']);
Route::put('books/{id}', [BookController::class, 'updateBook']);
Route::delete('books/{id}',[BookController::class, 'deleteBook']);

Route::get('booksType', [BookController::class, 'getAllTypesbook']);
Route::get('bookType/{id}', [BookController::class, 'getBook']);
Route::post('bookType', [BookController::class, 'createBookType']);
Route::put('bookType/{id}', [BookController::class, 'updateBookType']);
Route::delete('bookType/{id}',[BookController::class, 'deleteBookType']);
Route::get('bookType/{TypeBook}', [BookController::class, 'getBook']);
