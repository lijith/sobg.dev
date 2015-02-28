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
		Route::get('vcds',['as' => 'vcd', 'uses' => 'PublicationsController@vcdList']);
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
	Route::group(['prefix' => 'kailas-yatra'],function(){
		Route::get('/',['as' => 'kailasyatra', 'uses' => 'YatrasController@kailasHighlights']);
		Route::get('highlights',['as' => 'kailasHighlights', 'uses' => 'YatrasController@kailasHighlights']);
		Route::get('itinerary-and-cost',['as' => 'kailasDetails', 'uses' => 'YatrasController@kailasDetails']);
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
Route::group(['prefix' => 'e-shop'],function(){
	Route::get('/',['as' => 'eshop', 'uses' => 'PublicationsController@index']);
	Route::get('cart',['as' => 'cart', 'uses' => 'ShoppingCart@index']);
});

/*
|
|	gita family
|
*/
Route::get('gita-family',['as' => 'gitafamily', 'uses' => 'GitaFamily@index']);

/*
|
|	contact us
|
*/
Route::get('contact-us',['as' => 'contact', 'uses' => 'ContactUs@index']);


