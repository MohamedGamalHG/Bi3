<?php

use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\CategoryController;


/*Route::get('test',function (){
    return 'you are in test';
})->middleware('check_user')->name('test');*/

Auth::routes(['register' => false]);
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });

});

//Route::get('/hamza',function (){return 'you are not allowed';})->name('hamza');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){



    Route::group(['namespace'=>'Admin','middleware'=>'check_user'],function(){
        Route::get('/dashboard',function (){  return view('admin.master');})->name('dashboard');
        Route::resource('admin/category','CategoryController');
        Route::resource('admin/sub_category','SubCategoryController');
        Route::resource('admin/product','ProductController');
        Route::resource('admin/filter','FilterController');
        Route::resource('admin/subfilter','SubFilterController');
        //Route::get('create/{id}','ProductController@create')->name('create');
        Route::get('admin/createImage/{id}',[App\Http\Controllers\Admin\ProductController::class,'createImage'])->name('createImage');
        Route::get('admin/wizard-form',function (){
            return view('pages.default_wizard_form');
        })->name('wizard_from');
        Route::get('admin/search',function (){
            return view('pages.default_wizard_form');
        });
        Route::get('admin/test',function (){return view('pages.default_wizard_form');});
    });

    Route::group(['namespace'=>'Customer'],function(){
            Route::resource('customer','HomeController');
            Route::get('login/customer','HomeController@login_view')->name('login_view');
            Route::post('login/customer','HomeController@login_customer')->name('login_customer');
            Route::get('register/customer','HomeController@register_view')->name('register_view');
            Route::post('register/customer','HomeController@register_customer')->name('register_customer');
            Route::get('category/customer/{id}','HomeController@category')->name('category');

            Route::get('{name}/customer/{id}','HomeController@ShowProduct')->name('show_product');
            Route::get('about/{id}','HomeController@AboutProduct')->name('about_product');
            Route::post('filter/customer','HomeController@FilterProduct')->name('filter_product');
            Route::get('listing/customer','HomeController@listing')->name('listing');
            Route::post('listing/customer','HomeController@listing_post')->name('listing_post');
            Route::get('get_sub_id/{id}','HomeController@getsubid');
          /*  Route::get('samsung/customer/{id}',function ($id){
                $products = \App\Models\Product::where('subcategory_id',$id)->get();
                $subcat_product = SubCategory::withCount(['products'])->get();

                return view('customer.product',compact('products','subcat_product'));
            })->name('samsung.customer');
            Route::get('dodge/customer/{id}',function ($id){
                $products = \App\Models\Product::where('subcategory_id',$id)->get();
                $subcat_product = SubCategory::withCount(['products'])->get();

                return view('customer.product',compact('products','subcat_product'));
            })->name('dodge.customer');
            Route::get('screen/customer',function (){return 'samsn';})->name('screen.customer');
            Route::get('laptop/customer',function (){return 'samsn';})->name('laptop.customer');
            Route::get('salon/customer',function (){return 'samsn';})->name('salon.customer');
            Route::get('glasses/customer',function (){return 'samsn';})->name('glasses.customer');*/

            Route::get('logout/customer',function (){
            auth()->guard('customer')->logout();
            session()->invalidate();
            return redirect()->route('customer.index');

        })->name('logout_customer');
    });
    //Route::get('login',function (){return 'test';})->name('login');
    Route::get('/logout',function (){
        auth()->logout();
        session()->invalidate();
        return redirect('/');

    });

});

