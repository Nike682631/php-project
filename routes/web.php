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

Route::get( '/page/{slug}', 'HomeController@showPage' )->name( 'page.show' );

Auth::routes();

Route::get( '/', 'HomeController@index' )->name( 'home.index' );
Route::get( '/home', 'UserController@index' )->name( 'home' );
Route::get('/feed', 'ActivityFeedController@index')->name('feed');
Route::get('/early-access', 'LandingPageController@earlyAccess')->name('early-access');

/* Search routes */
Route::get('suggestions', 'SuggestionController@index')->name('suggestions.index');

/* User routes*/
Route::get( 'user/select-plan', 'UserController@selectPlanStep2' )->name( 'user.select-plan' );
Route::get( 'user/select-plan/{id}', 'UserController@selectPlan' )->name( 'user.select-plan-2' );
Route::get( 'user/company-details', 'UserController@companyDetails' )->name( 'user.company-details' );
Route::post( 'user/company-details', 'UserController@userInfoStore' )->name( 'user.info-store' );
Route::get( 'user/billing/{plan}', 'UserController@billing' )->name( 'user.billing' );
Route::get( 'user/payment/bank', 'UserController@paymentBank' )->name( 'user.payment.bank' );
Route::post( 'user/change-logo/', 'UserController@changeLogo' )->name( 'user.change-logo' );
Route::post( 'user/change-cover/', 'UserController@changeCover' )->name( 'user.change-cover' );
Route::get( 'user/{id}/products/', 'UserController@productsIndex' )->name( 'user.products' );
Route::post( 'user/{id}/add-buy/', 'UserController@assignBuyingCategories' )->name( 'user.buy-add' );
Route::post( 'user/{id}/add-sell/', 'UserController@assignSellingCategories' )->name( 'user.buy-sell' );

/* Register routes */
Route::get( 'register', 'RegisterController@step1Action' )->name( 'register' );
Route::get( 'register/step1', 'RegisterController@step1_1Action' )->name( 'register.step1' );
Route::get( 'register/step2', 'RegisterController@step2Action' )->name( 'register.step2' );
Route::get( 'register/step3', 'RegisterController@step3Action' )->name( 'register.step3' );

/* Social Logins */
Route::get( 'login/google', 'Auth\LoginController@redirectToGoogleProvider')->name( 'login.google' );
Route::get( 'login/google/callback', 'Auth\LoginController@handleGoogleCallback')->name( 'callback.google' );
Route::get( 'login/linkedIn', 'Auth\LoginController@redirectToLinkedInProvider')->name( 'login.linkedin' );
Route::get( 'login/linkedIn/callback', 'Auth\LoginController@handleLinkedInCallback')->name( 'callback.linkedin' );


Route::resource( 'user', 'UserController' );
Route::resource( 'logistics', 'LogisticsController' );
Route::resource( 'review', 'ReviewController' );
Route::get('logistics/type/{type}', 'LogisticsController@indexType')->name('logistics.type');
Route::post('/logistics/getCountries/','LogisticsController@getCountries')->name('logistics.getCountries');
/* Services routes */
Route::get( 'services/{id}', 'CategoryController@show' )->name( 'category.show' );
Route::get( 'services', 'CategoryController@index' )->name( 'category.index' );
Route::get( 'matches', 'MatchingController@index' )->name( 'matching.index' );
Route::post( 'images/store', 'ImageController@store' )->name( 'images.store' );
Route::post( 'media/store', 'ImageController@storeMedia' )->name( 'media.store' );

/* Company Certificate routes */
Route::resource( 'certificate', 'CompanyCertificateController' )->middleware( 'auth' );
Route::get('/certificate/delete/{id}', 'CompanyCertificateController@destroy')
     ->name('certificate.destroy');

/* Products routes */
Route::get( 'products/create', 'ProductController@create' )->name( 'products.create' );
Route::post( 'products/create', 'ProductController@store' )->name( 'products.store' );
Route::delete( 'products/{id}/delete', 'ProductController@destroy' )->name( 'products.delete' );

/* Categories routes */
Route::get('categories', 'CategoryController@showAllCategories' )->name( 'category.all' );

// Display products category
Route::get( 'products/category/all', 'CategoryController@showProductCategories' )->name( 'products.category.index' );

Route::get( 'products/category/{id}', 'CategoryController@showProduct' )->name( 'products.category' );

// Display
Route::get( 'products/show/{id}', 'ProductController@show' )->name( 'products.show' );
Route::get( 'language/set/{lang}', 'LanguageController@set' )->name( 'language.set' );

Route::get('/get-a-quote/', 'GetAQuoteController@index')->name('get-a-quote');

Route::get( 'products', 'CategoryController@productCategories' )->name( 'products.index' );
/* Messaging routes */
Route::get( 'message/{id}', 'MessageController@chatHistory' )->name( 'message.read' );
Route::get( 'message/new/{recipient_id}', 'MessageController@newChat' )->name( 'message.create' );
Route::group( [ 'prefix' => 'ajax', 'as' => 'ajax::' ], function () {
	Route::post( 'message/send', 'MessageController@ajaxSendMessage' )->name( 'message.new' );
	Route::delete( 'message/delete/{id}', 'MessageController@ajaxDeleteMessage' )->name( 'message.delete' );
} );
