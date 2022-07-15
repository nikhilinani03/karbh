<?php

use App\Http\Controllers\DataController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('signup');
});
Route::get('/login', function () {
    if(!empty(session('id')))
    {
        return redirect('users');
    }
    return view('login');

});
Route::resource('users',DataController::class);
Route::post('users/login',[DataController::class,'login']);
Route::get('logout',[DataController::class,'logout']);

