<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\option1\dashboardControl;
use App\Http\Controllers\option1\SOPControl;

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
Route::get('/option1/dashboard', function(Request $req) {
	
	//dd($req);
	
	return view(
		"option1.dashboard"
		,[
			"page_h1" => "Project dashboard"
			,"page_control" => $req->page_control ?? 1
			,"page_is_dev" => $req->page_is_dev ?? 1
			
		]
	);
});
Route::get('/option1/sop', function() {return view("option1.sop");});
Route::get('/option1/sop/search', function() {return view("option1.sop-search");});

//Route::get('/contacts', [contactController::class, 'contacts_search']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
