<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;


//use GeneralSetController;
//use Admin\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/','HomeController@Home')->name('home');
Route::post('/','HomeController@subscribe')->name('subscribe');
Route::get('/contact','HomeController@contactPage')->name('contactPage');
Route::post('/contact','HomeController@contactMessage')->name('contactMessage');

Route::get('/products','HomeController@allProducts')->name('all.products');

Route::get('/blogs','HomeController@blogs')->name('blogs');
Route::get('/blogs/{id}/{title}','HomeController@singleBlog')->name('singleBlog');

Route::get('/category-wise','HomeController@CategoryWise')->name('CategoryWise');
Route::get('/brand-wise','HomeController@BrandWise')->name('BrandWise');


Route::get('/product/{id}/{name}','HomeController@singleProduct')->name('singleProduct');


    //============== Add To Cart Section
Route::post('/add-to-cart','HomeController@addToCart')->name('addToCart')->middleware('auth');
Route::get('/checkout','HomeController@checkOut')->name('checkout')->middleware('auth');    // View Cart
Route::get('/cart-remove/{rowId}','HomeController@removeItem')->name('removeItem')->middleware('auth');

    //====== Wishlist
Route::post('/add-wishlist','HomeController@addWishlist')->name('addWishlist')->middleware('auth');
Route::get('/my-wishlist/{user_id}','HomeController@MyWishlist')->name('MyWishlist')->middleware('auth');

Route::get('/my-wishlist/remove/{user_id}/{product_id}','HomeController@removeWishlist')->name('removeWishlist')->middleware('auth');
Route::post('/product/review','HomeController@productReview')->name('productReview')->middleware('auth');





Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth']);

// Route::get('admin/index', function () {
//     $pageTitle = "Dashboard";
//     return view('admin/index', compact('pageTitle'));
// })->middleware(['admin'])->name('admin.index');

Route::get('/home', function () {
    return redirect('admin/index');
});
Route::get('/admin', function () {
    return redirect('admin/index');
});

require __DIR__ . '/auth.php';


//============== Admin Dashborad =================

Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function () {

    //=============  Admin er Dashboard
    Route::get('/index','DashboardController@index')->name('index');


    //========== admin Profile
    Route::get('/profile','AdminController@adminProfile')->name('adminProfile');
    Route::post('/profile/update/{id}','AdminController@adminProfileupdate')->name('adminProfileupdate');

    //================= Home Pages
    Route::get('/home-pages', 'HomeController@homePages')->name('homePages');
    Route::post('/home-pages', 'HomeController@homePagesinsert')->name('homePagesinsert');
    // Update
    Route::post('/home-pages/1', 'HomeController@HomePage1');
    Route::post('/home-pages/2', 'HomeController@HomePage2')->name('homepage2');
    Route::post('/home-pages/3', 'HomeController@HomePage3')->name('homepage3');
    Route::post('/home-pages/4', 'HomeController@HomePage4');
    Route::post('/home-pages/5', 'HomeController@HomePage5');
    //Route::get('/home-pages/delete', 'HomeController@delete')->name('delete');

    //===========favicon
    Route::get('/favicon', 'GeneralSetController@faviconcreate')->name('faviconcreate');
    Route::post('favicon', 'GeneralSetController@faviconInsert')->name('faviconinsert');

    //======logo
    Route::get('/logo', 'GeneralSetController@logocreate')->name('logocreate');
    Route::post('logo', 'GeneralSetController@logoInsert')->name('logoinsert');
    Route::get('/logo/delete/{id}', 'GeneralSetController@logoDelete')->name('logodelete');

    //==========slider
    Route::get('/slider', 'GeneralSetController@slidercreate')->name('slidercreate');
    Route::post('slider', 'GeneralSetController@sliderInsert')->name('sliderinsert');
    Route::get('/slider/delete/{id}', 'GeneralSetController@sliderDelete')->name('sliderdelete');

    //=====================Banners
    //===Top
    Route::get('/top-banner', 'GeneralSetController@topbannercreate')->name('topbannercreate');
    Route::post('top-banner', 'GeneralSetController@topbannerInsert')->name('topbannerinsert');
    Route::get('/top-banner/edit/{id}', 'GeneralSetController@topbannerEdit')->name('topbanneredit');
    Route::post('/top-banner/update/{id}', 'GeneralSetController@topbannerUpdate');
    Route::get('/top-banner/delete/{id}', 'GeneralSetController@topbannerDelete')->name('topbannerdelete');

    //====Middle
    Route::get('/middle-banner', 'GeneralSetController@middlebannercreate')->name('middlebannercreate');
    Route::post('middle-banner', 'GeneralSetController@middlebannerInsert')->name('middlebannerinsert');
    Route::get('/middle-banner/edit/{id}', 'GeneralSetController@middlebannerEdit')->name('middlebanneredit');
    Route::post('/middle-banner/update/{id}', 'GeneralSetController@middlebannerUpdate');
    Route::get('/middle-banner/delete/{id}', 'GeneralSetController@middlebannerDelete')->name('middlebannerdelete');

    //====Bottom
    Route::get('/bottom-banner', 'GeneralSetController@bottombannercreate')->name('bottombannercreate');
    Route::post('bottom-banner', 'GeneralSetController@bottombannerInsert')->name('bottombannerinsert');
    Route::get('/bottom-banner/edit/{id}', 'GeneralSetController@bottombannerEdit')->name('bottombanneredit');
    Route::post('/bottom-banner/update/{id}', 'GeneralSetController@bottombannerUpdate');
    Route::get('/bottom-banner/delete/{id}', 'GeneralSetController@bottombannerDelete')->name('bottombannerdelete');


    //==========partners
    Route::get('/partner', 'GeneralSetController@partnercreate')->name('partnercreate');
    Route::post('partner', 'GeneralSetController@partnerInsert')->name('partnerinsert');
    Route::get('/partner/edit/{id}', 'GeneralSetController@partnerEdit')->name('partneredit');
    Route::post('/partner/update/{id}', 'GeneralSetController@partnerUpdate');
    Route::get('/partner/delete/{id}', 'GeneralSetController@partnerDelete')->name('partnerdelete');

    //=========== blog Category
    Route::get('/blog-category', 'BlogController@blogCategorycreate')->name('blogcategorycreate');
    Route::post('blog-category', 'BlogController@blogCategoryInsert')->name('blogcategoryinsert');
    Route::get('/blog-category/delete/{id}', 'BlogController@blogCategoryDelete')->name('partnerdelete');

    //========== Blog Post
    Route::get('/blog-post', 'BlogController@blogPostcreate')->name('blogpostcreate');
    Route::get('/add-blog-post', 'BlogController@addBlogPostcreate')->name('addblogpost');
    Route::post('blog-post', 'BlogController@blogPostInsert')->name('blogpostinsert');
    Route::get('/blog-post/edit/{id}', 'BlogController@blogPostEdit')->name('blogpostedit');
    Route::post('/blog-post/update/{id}', 'BlogController@blogPostUpdate');
    Route::get('/blog-post/delete/{id}', 'BlogController@blogPostDelete')->name('blogpostdelete');


    //========== Message and Subcriber
    Route::get('/messages', 'SubandMessageController@showmessages')->name('messages');
    Route::get('/subscribers', 'SubandMessageController@showsubscribers')->name('subscribers');

    //=========== Contact Page
    Route::get('/contact', 'ContactSocialController@conactCreate')->name('contactcreate');
    Route::post('/add-contact', 'ContactSocialController@addContact')->name('addcontact');
    Route::get('/contact/edit/{id}', 'ContactSocialController@contactEdit')->name('contectedit');
    Route::post('/contact/update/{id}', 'ContactSocialController@contactUpdate');
    Route::get('/contact/delete/{id}', 'ContactSocialController@contactDelete')->name('contactdelete');

    //=========== Social Links
    Route::get('/social', 'ContactSocialController@socialCreate')->name('socialcreate');
    Route::post('/social', 'ContactSocialController@addSocial')->name('addsocial');
    Route::get('/social/edit/{id}', 'ContactSocialController@SocialEdit')->name('socialedit');
    Route::post('/social/update/{id}', 'ContactSocialController@socialUpdate');
    Route::get('/social/delete/{id}', 'ContactSocialController@socialDelete')->name('socialdelete');


    //===============  Categories

    Route::name('category.')->prefix('category')->group(function () {
        Route::get('/index', 'CategoryController@categoriesCreate')->name('index');
        Route::post('/store', 'CategoryController@addCategory')->name('store');
        Route::get('/edit/{id}', 'CategoryController@categoriesEdit')->name('categoriesEdit');
        Route::post('/update/{id}', 'CategoryController@categoriesUpdate')->name('categoriesUpdate');
        Route::get('/delete/{id}', 'CategoryController@categoriesDelete')->name('categoriesDelete');

    });

 //==============  sub category
    Route::name('Sub_Category.')->prefix('Sub_Category')->group(function () {
        Route::get('/index', 'CategoryController@subCategoriesCreate')->name('index');
        Route::post('/index', 'CategoryController@addSubCategory')->name('store');
        Route::get('/edit/{id}', 'CategoryController@subCategoriesEdit')->name('subCategoriesEdit');
        Route::post('/update/{id}', 'CategoryController@subCategoriesUpdate')->name('subCategoriesUpdate');
        Route::get('/delete/{id}', 'CategoryController@subCategoriesDelete')->name('subCategoriesDelete');
 
 });
    //==============  Child category
    Route::name('Child_Category.')->prefix('Child_Category')->group(function () {
        Route::get('/child-ctegories', 'CategoryController@childCategoriesCreate')->name('index');
        Route::post('/child-subctegories', 'CategoryController@childSubCategories')->name('showchildCat');
        Route::get('category/wise/sub/category/{id}', 'CategoryController@categoryWiseSubCatgoery')->name('category.wise.sub.category');
        Route::post('/store', 'CategoryController@addchildCategories')->name('store');
    });

//========= General Settings
    Route::namespace('Admin')->name('setting.')->prefix('setting')->group(function () {
        Route::get('/general', 'SettingController@general')->name('general');
        Route::post('/store', 'SettingController@updateGeneralSetting')->name('store');
    });

    //================== Product section   

    Route::resource('products',ProductController::class);

    Route::post('/products_ctegories', 'ProductController@SubCategories')->name('productCat');
    Route::get('product/category/wise/sub/category/{id}', 'ProductController@categoryWiseSubCatgoery')->name('product.category.wise.sub.category');

    Route::post('/products_ctegories', 'ProductController@chilCategories')->name('productchildCat');
    Route::get('category/wise/child/category/{id}', 'ProductController@categoryWiseChildCatgoery')->name('category.wise.child.category');
    Route::post('/Add-products','ProductController@productAdd')->name('productAdd');

//============update product
    Route::get('/product/edit/{id}', 'ProductController@editProduct')->name('editProduct');
    Route::post('/products_ctegories', 'ProductController@editSubCategories')->name('editproductCat');
    Route::get('category/wise/sub/category/{id}', 'ProductController@editcategoryWiseSubCatgoery')->name('editcategory.wise.sub.category');

    Route::post('/product/update/{id}', 'ProductController@updateProduct')->name('updateProduct');
    Route::get('/product/delete/{id}', 'ProductController@deleteProduct')->name('deleteProduct');

    //======================= brand
    Route::get('/brand', 'BrandController@index')->name('brand');
    Route::post('/brand', 'BrandController@insert')->name('brnadInsert');
    Route::get('/brand/delete/{id}', 'BrandController@delete')->name('brandDelete');

    //================ Best Seller Product
    Route::get('/best-product', 'ProductController@bestSeller')->name('bestSeller');
    Route::post('/best-product', 'ProductController@bestSellerIput')->name('bestSellerIput');
    Route::get('/best-product/delete/{id}', 'ProductController@bestSellerDelete')->name('bestSellerDelete');



});

//Route::get('admin/index',[AdminController::class,'index']);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});



