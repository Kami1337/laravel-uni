<?php
// Login
Auth::routes();

//Car
Route::get('/showroom', 'CarController@index')->name('store');
Route::get('/car/{car}', 'CarController@show');

// Inquiry
Route::get('/contact', 'InquiryController@create')->name('contact');
Route::post('/inquiry/new', 'InquiryController@store'); 

// Manufacturer
Route::get('/car/manufacturer/{manufacturer}','ManufacturerController@index');

// News
Route::get('/', 'NewsController@index')->name('home'); 
Route::get('/news/{news}', 'NewsController@show'); 

// Comment
Route::post('/car/{car}/comment', 'CommentController@store'); 


// About
Route::get('/about', 'NewsController@about')->name('about'); 

// Career
Route::get('/career', 'CareerController@index')->name('career');

// Cart 
Route::get('/cart', 'CarController@cart'); 
Route::get('/cart/checkout', 'CarController@checkout'); 
Route::get('/cart/checkout/complete', 'CarController@newOrder'); 
Route::post('/cart/checkout/complete', 'CarController@newOrder'); 
Route::post('/car/{car}/add', 'CarController@addToCart'); 
Route::get('/cart/remove/{id}', 'CarController@removeFromCart'); 
Route::get('/cart/plus/{id}', 'CarController@plus'); 
Route::get('/cart/minus/{id}', 'CarController@minus'); 

//Protect the admin only routes with middleware 
Route::group(['middleware' => 'is.admin'], function () {
    
    // Enginetype
    Route::get('/car/enginetype/{enginetype}','EnginetypeController@index');
    Route::get('/cms/enginetype/new','EnginetypeController@show');
    Route::get('/cms/enginetype/edit/{enginetype}','EnginetypeController@editView');
    Route::post('/cms/enginetype/edit/{enginetype}','EnginetypeController@edit');
    Route::post('/cms/enginetype/new','EnginetypeController@store');
    Route::post('/cms/enginetype/delete/{enginetype}','EnginetypeController@delete'); 
    
    // Manufacturer
    Route::get('/cms/manufacturer/new','ManufacturerController@show');
    Route::get('/cms/manufacturer/edit/{manufacturer}','ManufacturerController@editView');
    Route::post('/cms/manufacturer/edit/{manufacturer}','ManufacturerController@edit');
    Route::post('/cms/manufacturer/new','ManufacturerController@store');
    Route::post('/cms/manufacturer/delete/{manufacturer}','ManufacturerController@delete');

    // News
    Route::post('/cms/news/edit/{news}', 'NewsController@edit'); 
    Route::get('/cms/news/edit/{news}', 'NewsController@editView');
    Route::get('/cms/news/new', 'NewsController@create'); 
    Route::post('/cms/news/new', 'NewsController@store'); 
    Route::post('/cms/news/delete/{news}', 'NewsController@delete'); 
    
    // Work hours 
    Route::post('/cms/hours/edit/{hours}', 'CmsController@hours'); 

    // Car
    Route::get('/cms', 'CmsController@index')->name('cms');;
    Route::post('/cms/car/archive/{car}', 'CmsController@archive');
    Route::post('/cms/car/unarchive/{car}', 'CmsController@unArchive');
    Route::get('/cms/car/edit/{car}', 'CarController@editView');
    Route::post('/cms/car/edit/{car}', 'CarController@edit');
    Route::post('/cms/car/delete/{car}', 'CarController@delete');
    Route::get('/cms/car/new', 'CarController@create'); 
    Route::post('/cms/car/new', 'CarController@store'); 

    // Order
    Route::post('/cms/order/complete/{order}', 'CmsController@completeOrder');

    // Inquiry
    Route::post('/cms/inquiry/complete/{inquiry}', 'InquiryController@complete');  

    // Users
    Route::post('/cms/type/{user}', 'CmsController@type');

    // Career
    Route::get('/cms/career/new', 'CareerController@create');
    Route::post('/cms/career/new', 'CareerController@store');
    Route::get('/cms/career/edit/{career}', 'CareerController@edit');
    Route::post('/cms/career/edit/{career}', 'CareerController@update');
    Route::post('/cms/career/delete/{career}', 'CareerController@delete');

});
