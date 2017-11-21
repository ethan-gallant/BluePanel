<?php

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
    return redirect('/home');
});
Route::get('/test', function (){
   return view('kiosklogs');
});
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

/*
 * Kiosk user linking routes
 */
Route::delete('kiosks/{id}/detach/{user}', 'KioskController@detach');
Route::post('kiosks/{id}/attach/{user}', 'KioskController@attach');

//Kiosk toggle student route
Route::post('kiosks/{kiosk}/togglestudent/{student}', 'KioskController@toggleStudent');

//Kiosk routes log
Route::get('kiosks/{id}/logs', 'KioskController@logs');

//Standard kiosk route initialization
Route::resource('kiosks', 'KioskController');


Route::resource('users', 'UserController');

//Admin routes
Route::get('/admin/kiosks', 'KiosksController@admin_index');
