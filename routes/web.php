<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\HelloMiddleware;
// バリデーション
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function (Request $request) {
    return view('hello',['data'=>$request->data]);
})->middleware(middleware: HelloMiddleware::class);

# select
Route::get('hello',[HelloController::class,'index']);
// Route::post('hello',[HelloController::class,'post']);

# insert
Route::get('hello/add',[HelloController::class,'add']);
Route::post('hello/add',[HelloController::class,'create']);

# update
Route::get('hello/edit',[HelloController::class,'edit']);
Route::post('hello/edit',[HelloController::class,'update']);

# delete
Route::get('hello/del',[HelloController::class,'del']);
Route::post('hello/del',[HelloController::class,'remove']);

## person ################################################
Route::get('person/',[PersonController::class,'index']);
Route::get('person/find',[PersonController::class,'find']);
Route::post('person/find',[PersonController::class,'search']);
Route::get('person/edit',[PersonController::class,'edit']);
Route::post('person/edit',[PersonController::class,'update']);

# insert
Route::get('person/add',[PersonController::class,'add']);
Route::post('person/add',[PersonController::class,'create']);

# delete
Route::get('person/del',[PersonController::class,'del']);
Route::post('person/del',[PersonController::class,'remove']);

## board ################################################
Route::get('board',[BoardController::class,'index']);
Route::get('board/add',action: [BoardController::class,'add']);
Route::post('board/add',[BoardController::class,'create']);
