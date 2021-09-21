<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Auth;

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
Route::post('authuser', [usercontroller::class, 'login']);
// Route::get('/authuser', function () {
//     return view('list');
// });
Route::get('/logout', [usercontroller::class, 'logout']);
Route::get('/checkemail', [usercontroller::class, 'checkemail']);
Route::post('/checkemail', [usercontroller::class, 'checkemail']);
Route::get('/checkcontact', [usercontroller::class, 'checkcontact']);
Route::post('/checkcontact', [usercontroller::class, 'checkcontact']);
Route::get('/checkcontactedit', [usercontroller::class, 'CheckContactEdit']);
Route::post('/checkcontactedit', [usercontroller::class, 'CheckContactEdit']);
Route::get('/update/{id}', [usercontroller::class, 'updateDetail']);
Route::resource('updatedData', usercontroller::class);
Route::get('list', [usercontroller::class, 'list']);
Route::get('/delete/{id}', [usercontroller::class, 'deleteData']);
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');