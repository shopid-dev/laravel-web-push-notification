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

/*

array:2 [▼
  "publicKey" => "BOe-nXH6N-PPLs-Zy-QwO9oexlhOkMmDGosJmL9FbhpxLJF9DB1WlDH8uhtSOv_rPaBBtIf8p83OhrqZof6OZco"
  "privateKey" => "y_sN7mSmP6pPTHNZfbyEuLEx06J5TLE1r6-KXe1NIRQ"
]

*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', "App\Http\Controllers\PushController@index");
Route::post('/admin/sendpush/{push}', "App\Http\Controllers\PushController@send");

