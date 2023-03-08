<?php

// use App\Http\Controllers\EmployeeController;

// use App\Http\Controllers\BranchController;
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

//group ဖွဲ့ပြီးသုံး
Route::group(['namespace'=>'App\Http\Controllers'],function(){
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::get('/','HomeController@index');

    
    Route::group(['middleware'=>['guest']],function(){
        //register route
        Route::get('/register','RegisterController@show')->name('register.show');
        Route::post('/register','RegisterController@register')->name('register.registration');

        //log out
        Route::get('/login','LoginController@show')->name('login.show');

        Route::post('/login','LoginController@login')->name('login.loginUser');
    });

    Route::group(['middleware'=>['auth']],function(){
       
        Route::get('/logout','LogoutController@logout')->name('logout');
        Route::resource('/employee',EmployeeController::class);
        Route::resource('/branch',BranchController::class);

       
    });


});
