<?php

use App\Helpers\CurlHelper;
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

Route::get('/', function () {
    return view('pages.hello');
});

Route::get('/flash', function () {
    CurlHelper::get('https://jsonplaceholder.typicode.com/posts/1', ["a" => "b"]);
    return response()->redirectTo("/")->with("toast_primary", "Test");
});
