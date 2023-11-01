<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\TodoListController;

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

Route::apiResource('todolist',TodoListController::class);

Route::post('/numbertype/{number}',function( string $number) {

       if ((int) $number % 2 == 0) {
    return [
        'type' => "genap",
    ];
   }else {
    return [
        'type' => "ganjil",
    ];
   }
});


Route::post('/sayhello/{name}',function() {

       return "hello ".$name;
});

Route::post('/introduction/maker/{name}',function (string $name, Request $req) {
   $data = $req->all();
   $gender = $data['gender'];
   $age = $data['age'];
   $location = $data['location'];

   $response = response("hello🤗, my name is $name with $age Y.O, \n i am a $gender from $location",201);
   return $response;
});