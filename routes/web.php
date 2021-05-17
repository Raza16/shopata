<?php

use App\Http\Controllers\frontend\ShopController;
use Facade\FlareClient\Api;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
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

// Auth::routes();


// Route::group(['prefix' => '/admin'],function(){

        //route for login admin/login

        Route::group(['prefix' => '/admin'],function(){

            //route for login admin/login
            Auth::routes();

            Route::middleware(['auth', 'admin'])->group(function () {

                    Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class,'dashboard']);

                    //settings
                    Route::get('settings', [App\Http\Controllers\Admin\AdminController::class,'settings']);

                    Route::post('check-current-pwd', [App\Http\Controllers\Admin\AdminController::class,'checkcurrentpwd']);

                    Route::post('update-current-pwd', [App\Http\Controllers\Admin\AdminController::class,'updatecurrentpwd']);

                    Route::post('update-admin-details',[App\Http\Controllers\Admin\AdminController::class,'updatedetails']);

                    // banners
                    Route::resource('banner', App\Http\Controllers\Admin\BannerController::class);

                    // Route::get('websetting',[App\Http\Controllers\Admin\AdminController::class,'websetting']);
                    Route::get('websetting/{id}',[App\Http\Controllers\Admin\AdminController::class,'websetting']);
                    Route::put('websetting/update/{id}',[App\Http\Controllers\Admin\AdminController::class,'websettings']);

                        // pages
                    Route::get('pages',[App\Http\Controllers\Admin\SettingController::class,'pages']);
                        // privacy policy
                    Route::get('privacy',[App\Http\Controllers\Admin\SettingController::class,'privacypolicy']);
                        //  Terms & Conditions
                    Route::get('terms_condition',[App\Http\Controllers\Admin\SettingController::class,'terms_condition']);

                        //  blogs
                    Route::post('upload_image',[App\Http\Controllers\Admin\BlogController::class,'uploadImage'])->name('upload');

                    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);

                        //brand controller
                    Route::resource('brand', App\Http\Controllers\Admin\BrandController::class);

                        //category controller
                    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);

                        //product controller
                    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
                    Route::delete('product/gallerydelete/{id}',[App\Http\Controllers\Admin\ProductController::class,'deletegallery']);
                    Route::delete('product/documentdelete/{id}',[App\Http\Controllers\Admin\ProductController::class,'deletedocument']);
                    Route::get('variation-get/{id}', [App\Http\Controllers\Admin\ProductController::class,'variationoption'] );

                        // variation
                    Route::resource('variation', App\Http\Controllers\Admin\ProductAttributeController::class);

                        // product attributes option
                    Route::get('product_att_option/{id}/product_attribute_option',[App\Http\Controllers\Admin\ProductAttributeOptionController::class,'product_attribute_option'] );

                    Route::resource('variation_option', App\Http\Controllers\Admin\ProductAttributeOptionController::class);

                        // vendor
                    Route::resource('vendor', App\Http\Controllers\Admin\VendorController::class);


            });

    });



    // Route::middleware(['auth', 'customer'])->group(function () {

    //     Route::get('customer', function () {
    //         return 'customer';
    //     });

    // });


// });



// Route::get('/migrate', function () {
//     Artisan::call('migrate', [
//        '--force' => true
//     ]);

//     return 'Migrate Database Successfully!';
// });


// frontend route start

 Route::resource('account', App\Http\Controllers\frontend\Auth\RegisterController::class);


 Route::get('/', [App\Http\Controllers\frontend\ShopController::class,'home']);

 Route::post('email_subcription',[App\Http\Controllers\frontend\ShopController::class,'email_subcription']);

 Route::get('contactus',function(){
        return view('frontend.contactus');
 });
 Route::get('aboutus',function(){
        return view('frontend.aboutus');
 });
 Route::get('privacypolicy',function(){
        return view('frontend.privacypolicy');
 });
 Route::get('help',function(){
        return view('frontend.help');
 });


    //search
    Route::get('livesearch',[\App\Http\Controllers\frontend\ShopController::class,'']);

    // shop page start
    Route::get('shop',[App\Http\Controllers\frontend\ShopController::class,'shop']);

    //  simple product
    Route::get('shop/{slug}',[App\Http\Controllers\frontend\ShopController::class,'singleshop']);

    //  digital product
    Route::get('digital/{slug}',[App\Http\Controllers\frontend\ShopController::class,'singleshop']);

    //  download
    Route::get('shop/download/{id}',[App\Http\Controllers\frontend\ShopController::class,'getDownload']);
    //  leave review
    Route::get('leave/{slug}',[App\Http\Controllers\frontend\ShopController::class, 'leave_review']);
    // categoryController
    // Route::get('shops/{category}',[App\Http\Controllers\frontend\ShopController::class,'categories']);

    Route::get('search',[\App\Http\Controllers\frontend\ShopController::class,'search']);

    // blog
    Route::get('blog',[App\Http\Controllers\frontend\ShopController::class,'blog']);

    Route::get('blog/{slug}',[App\Http\Controllers\frontend\ShopController::class,'single_blog']);

    Route::get('leave_review', function () {
        return view('frontend.leave_review');
    });
    Route::get('store_directory', function () {
        return view('frontend.store_directory');
    });

    // Route::get('account', function () {
    //     return view('frontend.account');
    // });



    Route::get('track_order', function () {
        return view('frontend.track_order');
    });

    Route::get('shop/category/{cat}',[\App\Http\Controllers\frontend\ShopController::class,'shop']);


    Route::get('test',[App\Http\Controllers\TestController::class,'cate']);


    Route::get('test',[App\Http\Controllers\TestController::class,'cate'])->name('category');
