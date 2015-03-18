<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as' => 'home','uses' => 'HomeController@index']);

/*
|
|	about sobg routes
|
*/
Route::group(['prefix'=>'about-sobg'],function(){
	
	Route::get('/',['as' => 'aboutsobg', 'uses' => 'AboutSobgController@overview']);
	Route::get('overview',['as' => 'overview', 'uses' =>'AboutSobgController@overview']);
	
	Route::group(['prefix' => 'salagramam'],function(){
		Route::get('/',['as' => 'salagramam', 'uses' => 'AboutSobgController@salagramam']);
		Route::get('guided-tour',['as' => 'guidedTour', 'uses' => 'AboutSobgController@guidedTour']);
		Route::get('facilities-for-public',['as' => 'facilities', 'uses' => 'AboutSobgController@facilities']);
	});

	Route::get('centers',['as' => 'centers', 'uses' => 'AboutSobgController@centers']);
	Route::get('his-vision',['as' => 'hisVision', 'uses' => 'AboutSobgController@hisVision']);

});

/*
|
|	guru routes
|
*/
Route::group(['prefix' => 'guru'],function(){
	Route::get('swami-sandeepananda-giri',['as' => 'swami', 'uses' => 'GuruController@swami']);
	Route::get('milestones-in-spiritual-journey',['as' => 'milestones', 'uses' => 'GuruController@milestones']);
	Route::get('swami-kashikananda-giri-maharaj',['as' => 'kashikananda', 'uses' => 'GuruController@kashikananda']);
	Route::get('articles-and-interviews',['as' => 'articles', 'uses' => 'GuruController@articlesAndInterviews']);
	Route::get('itinerary',['as' => 'itinerary', 'uses' => 'GuruController@itinerary']);
	Route::get('message-from-swami',['as' => 'messageFromSwami', 'uses' => 'GuruController@messageFromSwami']);
	Route::get('write-to-swami',['as' => 'writeToSwami', 'uses' => 'GuruController@writeToSwami']);
});

/*
|
|	courses routes
|
*/
Route::group(['prefix' => 'courses-and-retreats'],function(){
	Route::get('/',['as' => 'courses', 'uses' => 'CoursesAndRetreatsController@index']);
	Route::get('for-children',['as' => 'children', 'uses' => 'CoursesAndRetreatsController@children']);
	Route::get('for-seniors',['as' => 'seniors', 'uses' => 'CoursesAndRetreatsController@seniors']);
});

/*
|
|	publications listing
|
*/
Route::group(['prefix' => 'publications'],function(){
	Route::get('/',['as' => 'publications', 'uses' => 'PublicationsController@index']);
	Route::group(['prefix' => 'cds-dvds'],function(){
		Route::get('dvds',['as' => 'dvd', 'uses' => 'PublicationsController@dvdList']);
		Route::get('mp3',['as' => 'mp3', 'uses' => 'PublicationsController@mp3List']);
		Route::get('audio-cds',['as' => 'acd', 'uses' => 'PublicationsController@audioList']);
	});
	Route::group(['prefix' => 'books'],function(){
		Route::get('books-by-swami',['as' => 'swamibooks', 'uses' => 'PublicationsController@booksBySwami']);
		Route::get('other-titles',['as' => 'otherbooks', 'uses' => 'PublicationsController@otherTitles']);
	});
	Route::get('piravi-magazine',['as' => 'piravi', 'uses' => 'PublicationsController@piravi']);
});

/*
|
|	spiritual journeys
|
*/
Route::group(['prefix' => 'spiritual-journeys'],function(){
	Route::get('/',['as' => 'yatras', 'uses' => 'YatrasController@index']);
	Route::group(['prefix' => 'kailas-yatra'],function(){
		Route::get('/',['as' => 'kailasyatra', 'uses' => 'YatrasController@kailasHighlights']);
		Route::get('highlights',['as' => 'kailasHighlights', 'uses' => 'YatrasController@kailasHighlights']);
		Route::get('itinerary-and-cost',['as' => 'kailasDetails', 'uses' => 'YatrasController@kailasDetails']);
		Route::get('tips-for-yatris',['as' => 'kailastips', 'uses' => 'YatrasController@kailasTips']);
	});
	Route::group(['prefix' => 'himalaya-yatra'],function(){
		Route::get('/',['as' => 'himalayayatra', 'uses' => 'YatrasController@himalayaHighlights']);
		Route::get('highlights',['as' => 'himalayaHighlights', 'uses' => 'YatrasController@himalayaHighlights']);
		Route::get('itinerary-and-cost',['as' => 'himalayaDetails', 'uses' => 'YatrasController@himalayaDetails']);
	});
	Route::group(['prefix' => 'amarnath-yatra'],function(){
		Route::get('/',['as' => 'amarnathyatra', 'uses' => 'YatrasController@amarnathHighlights']);
		Route::get('highlights',['as' => 'amarnathHighlights', 'uses' => 'YatrasController@amarnathHighlights']);
		Route::get('itinerary-and-cost',['as' => 'amarnathDetails', 'uses' => 'YatrasController@amarnathDetails']);
	});
	Route::get('registration',['as' => 'Registration', 'uses' => 'YatrasController@Registration']);
	Route::get('other-yathras',['as' => 'otherYatras', 'uses' => 'YatrasController@otherYatras']);
	Route::get('yathris-speak',['as' => 'testimonials', 'uses' => 'YatrasController@testimonials']);

});

/*
|
|	Donate
|
*/
Route::get('donate-support',['as' => 'donate', 'uses' => 'donateController@index']);

/*
|
|	e-shop
|
*/
// Route::group(['prefix' => 'e-shop'],function(){
// 	Route::get('/',['as' => 'eshop', 'uses' => 'PublicationsController@index']);
// 	Route::get('cart',['as' => 'cart', 'uses' => 'ShoppingCart@index']);
// });

/*
|
|	gita family
|
*/
// Route::get('gita-family',['as' => 'gitafamily', 'uses' => 'GitaFamily@index']);

/*
|
|	contact us
|
*/
// Route::get('contact-us',['as' => 'contact', 'uses' => 'ContactUs@index']);

/*
|
|	contact us
|
*/
Route::get('bhavishya',['as' => 'bhavishya', 'uses' => 'Bhavishya@index']);



/*
| ----------------------
|	Administrator Routes
| ----------------------
*/
Route::get('administrator',['middleware' => 'sentry.admin','as' => 'admin.dash', 'uses' => 'Admin\AdministratorController@show']);

Route::group(['prefix'=>'administrator', 'namespace' => 'Admin'], function(){
	Route::get('login', ['as' => 'sentinel.login', 'uses' => 'SessionController@create']);
	Route::get('logout', ['as' => 'sentinel.logout', 'uses' => 'SessionController@destroy']);
	//     // Sentinel Session Routes
  Route::get('login', ['as' => 'sentinel.login', 'uses' => 'SessionController@create']);
  Route::get('logout', ['as' => 'sentinel.logout', 'uses' => 'SessionController@destroy']);
  Route::get('sessions/create', ['as' => 'sentinel.session.create', 'uses' => 'SessionController@create']);
  Route::post('sessions/store', ['as' => 'sentinel.session.store', 'uses' => 'SessionController@store']);
  Route::delete('sessions/destroy', ['as' => 'sentinel.session.destroy', 'uses' => 'SessionController@destroy']);

  // Sentinel Registration
  Route::get('register', ['as' => 'sentinel.register.form', 'uses' => 'RegistrationController@registration']);
  Route::post('register', ['as' => 'sentinel.register.user', 'uses' => 'RegistrationController@register']);
  Route::get('users/activate/{hash}/{code}', ['as' => 'sentinel.activate', 'uses' => 'RegistrationController@activate']);
  Route::get('reactivate', ['as' => 'sentinel.reactivate.form', 'uses' => 'RegistrationController@resendActivationForm']);
  Route::post('reactivate', ['as' => 'sentinel.reactivate.send', 'uses' => 'RegistrationController@resendActivation']);
  Route::get('forgot', ['as' => 'sentinel.forgot.form', 'uses' => 'RegistrationController@forgotPasswordForm']);
  Route::post('forgot', ['as' => 'sentinel.reset.request', 'uses' => 'RegistrationController@sendResetPasswordEmail']);
  Route::get('reset/{hash}/{code}', ['as' => 'sentinel.reset.form', 'uses' => 'RegistrationController@passwordResetForm']);
  Route::post('reset/{hash}/{code}', ['as' => 'sentinel.reset.password', 'uses' => 'RegistrationController@resetPassword']);

  // Sentinel Profile
  Route::get('profile', ['as' => 'sentinel.profile.show', 'uses' => 'ProfileController@show']);
  Route::get('profile/edit', ['as' => 'sentinel.profile.edit', 'uses' => 'ProfileController@edit']);
  Route::put('profile', ['as' => 'sentinel.profile.update', 'uses' => 'ProfileController@update']);
  Route::post('profile/password', ['as' => 'sentinel.profile.password', 'uses' => 'ProfileController@changePassword']);

  // Sentinel Users
  Route::get('users', ['as' => 'sentinel.users.index', 'uses' => 'UserController@index']);
  Route::get('users/create', ['as' => 'sentinel.users.create', 'uses' => 'UserController@create']);
  Route::post('users', ['as' => 'sentinel.users.store', 'uses' => 'UserController@store']);
  Route::get('users/{hash}', ['as' => 'sentinel.users.show', 'uses' => 'UserController@show']);
  Route::get('users/{hash}/edit', ['as' => 'sentinel.users.edit', 'uses' => 'UserController@edit']);
  Route::post('users/{hash}/password', ['as' => 'sentinel.password.change', 'uses' => 'UserController@changePassword']);
  Route::post('users/{hash}/memberships', ['as' => 'sentinel.users.memberships', 'uses' => 'UserController@updateGroupMemberships']);
  Route::put('users/{hash}', ['as' => 'sentinel.users.update', 'uses' => 'UserController@update']);
  Route::delete('users/{hash}', ['as' => 'sentinel.users.destroy', 'uses' => 'UserController@destroy']);
  Route::get('users/{hash}/suspend', ['as' => 'sentinel.users.suspend', 'uses' => 'UserController@suspend']);
  Route::get('users/{hash}/unsuspend', ['as' => 'sentinel.users.unsuspend', 'uses' => 'UserController@unsuspend']);
  Route::get('users/{hash}/ban', ['as' => 'sentinel.users.ban', 'uses' => 'UserController@ban']);
  Route::get('users/{hash}/unban', ['as' => 'sentinel.users.unban', 'uses' => 'UserController@unban']);

  // Sentinel Groups
  Route::get('groups', ['as' => 'sentinel.groups.index', 'uses' => 'GroupController@index']);
  Route::get('groups/create', ['as' => 'sentinel.groups.create', 'uses' => 'GroupController@create']);
  Route::post('groups', ['as' => 'sentinel.groups.store', 'uses' => 'GroupController@store']);
  Route::get('groups/{hash}', ['as' => 'sentinel.groups.show', 'uses' => 'GroupController@show']);
  Route::get('groups/{hash}/edit', ['as' => 'sentinel.groups.edit', 'uses' => 'GroupController@edit']);
  Route::put('groups/{hash}', ['as' => 'sentinel.groups.update', 'uses' => 'GroupController@update']);
  Route::delete('groups/{hash}', ['as' => 'sentinel.groups.destroy', 'uses' => 'GroupController@destroy']);
});

// Route::controllers([
// 'auth' => 'Auth\AuthController',
// 'password' => 'Auth\PasswordController',
// ]);



// });
