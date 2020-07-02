<?php
use Illuminate\Support\Facades\Auth;

/*--------------------start Home Controller routes-----------------*/


Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::get('/team', function () {
    return view('frontend.team');
});

Route::get('/change_pass', function () {
    return view('frontend.include.profile.change_pass');
});


Route::get('/', 'Home@index')->name('client.home');
Route::get('/products', 'Home@search');
Route::get('/search', 'Home@search')->name('client.profile');

Route::get('/category-search/{id}', 'Home@category_search')->name('client.category.search');

// Route::get('/confirm_order', 'Product@confirm_order')->name('client.profile.order');

Route::group(['middleware' => ['auth:client']], function() { 
    Route::get('/get_messages/{id}', 'Home@get_messages')->name('client.get_messages');
    Route::get('/messages', 'Home@messages')->name('client.messages');
    Route::post('/send_message_ajax', 'Home@send_message_ajax')->name('client.send_message_ajax');
    Route::post('/send_message', 'Home@send_message')->name('client.send_message');
    Route::get('/profile', 'Home@profile')->name('client.profile');
    Route::any('/edit_profile', 'Home@edit_profile')->name('client.profile.edit');
    Route::get('/my_order', 'Home@my_order')->name('client.profile.myorder');
    Route::any('/add_product', 'Product@add')->name('client.product.add');
    Route::any('/edit_product/{id}', 'Product@edit')->name('client.product.edit');
    Route::get('/my_products', 'Product@my_products')->name('client.profile.products');
    Route::get('/confirm_order', 'Product@confirm_order')->name('client.profile.order');
});


Route::get('/product-details/{id}', 'Home@product_details')->name('client.product.details');

Route::get('/cart-summery', 'CartController@cart');
Route::post('/cart/add', 'CartController@add')->name('client.cart.add');
Route::post('/cart/delete', 'CartController@delete')->name('client.cart.delete');


Route::get('/login','Auth\ClientLoginController@showLoginForm')->name('client.login');
Route::post('/login', 'Auth\ClientLoginController@login')->name('client.login.submit');
Route::get('/logout', 'Auth\ClientLoginController@logout')->name('client.logout');

Route::get('/register','Home@register');
Route::post('/register', 'Auth\ClientRegisterController@register')->name('client.register.submit');

/*----------------------login, logout, Authentication-----------*/
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    //Auth::routes(['register' => false]);
});

/*---------------------user, admin panel------------------------*/
Route::get('/admin', 'Admin\AdminController@index')->name('admin');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    /*---------------------User Admin Controller ---------------------*/
    Route::prefix('/user')->group(function () {
        Route::get('/', 'UserAdmin@userlist')->name('a_userlist');
        Route::any('/edit/{id}', 'UserAdmin@userEdit')->name('a_userEdit');
        Route::get('/delete/{id}', 'UserAdmin@userDelete')->name('a_userDelete');
        Route::get('/status/{id}/{value}', 'UserAdmin@userStatus')->name('a_userStatus');
        Route::any('/add', 'UserAdmin@userAdd')->name('a_userAdd');
        Route::any('/password', 'UserAdmin@userPassword')->name('a_userPassword');

    });

    Route::prefix('/client')->group(function () {
        Route::get('/', 'HomeAdmin@clientlist')->name('a_clientlist');
        Route::get('/status/{id}/{value}', 'HomeAdmin@clientStatus')->name('a_clientStatus');
    });

    /*---------------------Admin Home Content (slider)---------------*/

    Route::prefix('/home')->group(function () {

        Route::prefix('/slider')->group(function () {
            Route::get('/', 'HomeAdmin@slider')->name('a_slider');
            Route::any('/add', 'HomeAdmin@sliderAdd')->name('a_sliderAdd');
            Route::any('/edit/{id}', 'HomeAdmin@sliderEdit')->name('a_sliderEdit');
            Route::get('/delete/{id}', 'HomeAdmin@sliderDelete')->name('a_sliderDelete');
            Route::get('/status/{id}/{value}/{status}', 'HomeAdmin@sliderStatus')->name('a_sliderStatus');
        });

        Route::prefix('/category')->group(function () {
            Route::get('/', 'HomeAdmin@category')->name('a_category');
            Route::any('/add', 'HomeAdmin@categoryAdd')->name('a_categoryAdd');
            Route::any('/edit/{id}', 'HomeAdmin@categoryEdit')->name('a_categoryEdit');
            Route::get('/delete/{id}', 'HomeAdmin@categoryDelete')->name('a_categoryDelete');
            Route::get('/status/{id}/{value}/{status}', 'HomeAdmin@categoryStatus')->name('a_categoryStatus');
        });

        Route::prefix('/products')->group(function () {
            Route::get('/', 'HomeAdmin@products')->name('a_products');
            Route::get('/status/{id}/{value}/{status}', 'HomeAdmin@productsStatus')->name('a_productsStatus');
        });

    });
});

/*---------------- routes for shared hosting server-------------*/

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return "cache cleared successfully!";
});

Route::get('/clear-view', function () {
    $exitCode = Artisan::call('view:clear');
    return "view cleared successfully!";
});

Route::get('/clear-config', function () {
    $exitCode = Artisan::call('config:clear');
    return "config cleared successfully!";
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});