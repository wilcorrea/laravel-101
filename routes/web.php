<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/health', static function () {
    try {
        DB::connection()->getPdo();
        return "it's ok";
    } catch (Throwable) {
        return "it's bad";
    }
});

Route::resource('users', UserController::class);
