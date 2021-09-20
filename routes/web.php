<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;

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
    return view('register');
});
Route::post('login', [usercontroller::class, 'index']);
Route::get('/login', function () {
    return view('login');
});
Route::post('authuser', [usercontroller::class, 'list']);
Route::get('/authuser', function () {
    return view('list');
});
Route::get('/logout', [usercontroller::class, 'logout']);
Route::get('/checkemail', [usercontroller::class, 'checkemail']);
Route::post('/checkemail', [usercontroller::class, 'checkemail']);
Route::get('/checkcontact', [usercontroller::class, 'checkcontact']);
Route::post('/checkcontact', [usercontroller::class, 'checkcontact']);