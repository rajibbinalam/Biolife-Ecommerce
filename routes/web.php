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
                        //===Top
    Route::get('/top-banner', 'App\Http\Controllers\GeneralSetController@topbannercreate')->name('topbannercreate');
    Route::post('top-banner', 'App\Http\Controllers\GeneralSetController@topbannerInsert')->name('topbannerinsert');
    Route::get('/top-banner/edit/{id}', 'App\Http\Controllers\GeneralSetController@topbannerEdit')->name('topbanneredit');
    Route::post('/top-banner/update/{id}', 'App\Http\Controllers\GeneralSetController@topbannerUpdate');
    Route::get('/top-banner/delete/{id}', 'App\Http\Controllers\GeneralSetController@topbannerDelete')->name('topbannerdelete');

        //====Middle
    Route::get('/middle-banner', 'App\Http\Controllers\GeneralSetController@middlebannercreate')->name('middlebannercreate');
    Route::post('middle-banner', 'App\Http\Controllers\GeneralSetController@middlebannerInsert')->name('middlebannerinsert');
    Route::get('/middle-banner/edit/{id}', 'App\Http\Controllers\GeneralSetController@middlebannerEdit')->name('middlebanneredit');
    Route::post('/middle-banner/update/{id}', 'App\Http\Controllers\GeneralSetController@middlebannerUpdate');
    Route::get('/middle-banner/delete/{id}', 'App\Http\Controllers\GeneralSetController@middlebannerDelete')->name('middlebannerdelete');

        //====Bottom
    Route::get('/bottom-banner', 'App\Http\Controllers\GeneralSetController@bottombannercreate')->name('bottombannercreate');
    Route::post('bottom-banner', 'App\Http\Controllers\GeneralSetController@bottombannerInsert')->name('bottombannerinsert');
    Route::get('/bottom-banner/edit/{id}', 'App\Http\Controllers\GeneralSetController@bottombannerEdit')->name('bottombanneredit');
    Route::post('/bottom-banner/update/{id}', 'App\Http\Controllers\GeneralSetController@bottombannerUpdate');
    Route::get('/bottom-banner/delete/{id}', 'App\Http\Controllers\GeneralSetController@bottombannerDelete')->name('bottombannerdelete');


//==========partners

    Route::get('/partner', 'App\Http\Controllers\GeneralSetController@partnercreate')->name('partnercreate');
    Route::post('partner', 'App\Http\Controllers\GeneralSetController@partnerInsert')->name('partnerinsert');
    Route::get('/partner/edit/{id}', 'App\Http\Controllers\GeneralSetController@partnerEdit')->name('partneredit');
    Route::post('/partner/update/{id}', 'App\Http\Controllers\GeneralSetController@partnerUpdate');
    Route::get('/partner/delete/{id}', 'App\Http\Controllers\GeneralSetController@partnerDelete')->name('partnerdelete');

//=========== blog vategory

    Route::get('/blog-category', 'App\Http\Controllers\BlogController@blogCategorycreate')->name('blogcategorycreate');
    Route::post('blog-category', 'App\Http\Controllers\BlogController@blogCategoryInsert')->name('blogcategoryinsert');
    Route::get('/blog-category/delete/{id}', 'App\Http\Controllers\BlogController@blogCategoryDelete')->name('partnerdelete');

//========== Blog Post

    Route::get('/blog-post', 'App\Http\Controllers\BlogController@blogPostcreate')->name('blogpostcreate');
    Route::get('/add-blog-post', 'App\Http\Controllers\BlogController@addBlogPostcreate')->name('addblogpost');
    Route::post('blog-post', 'App\Http\Controllers\BlogController@blogPostInsert')->name('blogpostinsert');
    Route::get('/blog-post/edit/{id}', 'App\Http\Controllers\BlogController@blogPostEdit')->name('blogpostedit');
    Route::post('/blog-post/update/{id}', 'App\Http\Controllers\BlogController@blogPostUpdate');
    Route::get('/blog-post/delete/{id}', 'App\Http\Controllers\BlogController@blogPostDelete')->name('blogpostdelete');


//========== Message and Subcriber

    Route::get('/messages', 'App\Http\Controllers\SubandMessageController@showmessages')->name('messages');
    Route::get('/subscribers', 'App\Http\Controllers\SubandMessageController@showsubscribers')->name('subscribers');

//=========== Contact Page

    Route::get('/contact', 'App\Http\Controllers\ContactSocialController@conactCreate')->name('contactcreate');
    Route::post('/add-contact', 'App\Http\Controllers\ContactSocialController@addContact')->name('addcontact');

    Route::get('/contact/edit/{id}', 'App\Http\Controllers\ContactSocialController@contactEdit')->name('contectedit');
    Route::post('/contact/update/{id}', 'App\Http\Controllers\ContactSocialController@contactUpdate');
    Route::get('/contact/delete/{id}', 'App\Http\Controllers\ContactSocialController@contactDelete')->name('contactdelete');;










});










//Route::get('admin/index',[AdminController::class,'index']);







//=========Multi Authentication


// Route::get('admin/index',[AdminController::class,'index'])->name('admin.index');
// Route::get('admin',[AuthenticatedSessionController::class,'ShowLoginForm'])->name('admin.ashowloginform');
// Route::post('admin',[AuthenticatedSessionController::class,'login'])->name('admin.login');