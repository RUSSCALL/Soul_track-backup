<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\collosalController;
// use App\Http\Controllers\DataTableController;


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
    return view('auth.login');
});


Route::get('/program_create' , 'App\Http\Controllers\programController@index')->name('CreateProgramsTab');

Route::get('/soul_search' , [UserController::class, 'index'])->name('user.index');
// Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('/search' , [UserController::class, 'searchPage'])->name('soul_searching');

Route::post('/program_create' , 'App\Http\Controllers\programController@create');

Route::post('/role_change/{id}' , 'App\Http\Controllers\adminController@update');

Route::delete('/end_program' , 'App\Http\Controllers\programController@destroy');

Route::get('/program' , 'App\Http\Controllers\programController@show')->name('programs');

Route::post('/user_program_entry' , 'App\Http\Controllers\programController@store');

Route::get('/adminDashboard' , 'App\Http\Controllers\admincontroller@index')->name('adminboard');

Route::post('/soul_form', 'App\Http\Controllers\collosalController@store');

Route::get('/dashboard', 'App\Http\Controllers\collosalController@create')->name('dashboard');

Route::get('/soullist' , 'App\Http\Controllers\collosalController@show')->name('soullist');

Route::get('/attendance_form' , 'App\Http\Controllers\attendanceController@index')->name('attdform');

Route::post('/attendance_submit' , 'App\Http\Controllers\attendanceController@store')->name('attdsubmit');

Route::get('/soulmod/{id}/edit' , 'App\Http\Controllers\collosalController@edit');

Route::post('/soulmod/{id}/update' , 'App\Http\Controllers\collosalController@update');

Route::get('/soulmod/{soulmod}/delete' , 'App\Http\Controllers\collosalController@destroy');

require __DIR__.'/auth.php';
