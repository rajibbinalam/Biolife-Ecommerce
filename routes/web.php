<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\GeneralSetController;
//use App\Http\Controllers\Admin\AuthenticatedSessionController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect('admin/index');
})->middleware(['auth'])->name('dashboard');

Route::get('admin/index', function () {
        return view('admin/index');
    })->middleware(['auth']);

Route::get('/home', function () {
        return redirect('admin/index');
    });
Route::get('/admin', function () {
        return redirect('admin/index');
    });

require __DIR__.'/auth.php';


//============== Admin Dashborad =================

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function(){

//===========favicon
    Route::get('/favicon', 'App\Http\Controllers\GeneralSetController@faviconcreate')->name('faviconcreate');
    Route::post('favicon', 'App\Http\Controllers\GeneralSetController@faviconInsert')->name('faviconinsert');

//======logo
    Route::get('/logo', 'App\Http\Controllers\GeneralSetController@logocreate')->name('logocreate');
    Route::post('logo', 'App\Http\Controllers\GeneralSetController@logoInsert')->name('logoinsert');
    Route::get('/logo/delete/{id}', 'App\Http\Controllers\GeneralSetController@logoDelete')->name('logodelete');
//==========slider
    Route::get('/slider', 'App\Http\Controllers\GeneralSetController@slidercreate')->name('slidercreate');
    Route::post('slider', 'App\Http\Controllers\GeneralSetController@sliderInsert')->name('sliderinsert');
    Route::get('/slider/delete/{id}', 'App\Http\Controllers\GeneralSetController@sliderDelete')->name('sliderdelete');

    //==========Banners

    Route::get('/top-banner', 'App\Http\Controllers\GeneralSetController@topbannercreate')->name('topbannercreate');
    Route::post('top-banner', 'App\Http\Controllers\GeneralSetController@topbannerInsert')->name('topbannerinsert');
    Route::get('/top-banner/delete/{id}', 'App\Http\Controllers\GeneralSetController@topbannerDelete')->name('topbannerdelete');
    Route::get('/top-banner/edit/{id}', 'App\Http\Controllers\GeneralSetController@topbannerEdit')->name('topbanneredit');
    Route::post('/top-banner/update/{id}', 'App\Http\Controllers\GeneralSetController@topbannerUpdate');




});










//Route::get('admin/index',[AdminController::class,'index']);







//=========Multi Authentication


// Route::get('admin/index',[AdminController::class,'index'])->name('admin.index');
// Route::get('admin',[AuthenticatedSessionController::class,'ShowLoginForm'])->name('admin.ashowloginform');
// Route::post('admin',[AuthenticatedSessionController::class,'login'])->name('admin.login');