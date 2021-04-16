<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\option1\dashboardControl;
use App\Http\Controllers\option1\sopControl;

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

Route::get('/option1', function () {return redirect('/option1/dashboard');});

Route::match(array('GET', 'POST'),'/option1/dashboard{path}', [dashboardControl::class, 'dashboardControl'])->where('path', '.*');
Route::match(array('GET','POST'),'/option1/sop{path}', [sopControl::class, 'sopControl'])->where('path', '.*');

// Route::post('/option1/sop{path}',function($path){
	
	// echo "test";die;
// })->where('path', '.*');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');