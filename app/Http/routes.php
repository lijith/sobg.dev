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

Route::get('/','HomeController@index');

/*
|
|	about sobg routes
|
*/
Route::group(['prefix'=>'about-sobg'],function(){
	
	Route::get('/','AboutSobgController@overview');
	Route::get('overview','AboutSobgController@overview');
	
	Route::group(['prefix' => 'salagramam'],function(){
		Route::get('/','AboutSobgController@salagramam');
		Route::get('guided-tour','AboutSobgController@guidedTour');
		Route::get('facilities-for-public','AboutSobgController@facilities');
	});

	Route::get('centers','AboutSobgController@centers');
	Route::get('his-vision','AboutSobgController@hisVision');

});

/*
|
|	guru routes
|
*/
Route::group(['prefix' => 'guru'],function(){
	Route::get('swami-sandeepananda-giri','GuruController@swami');
	Route::get('milestones-in-spiritual-journey','GuruController@milestones');
	Route::get('swami-kashikananda-giri-maharaj','GuruController@kashikananda');
	Route::get('articles-and-interviews','GuruController@articlesAndInterviews');
	Route::get('itinerary','GuruController@itinerary');
	Route::get('message-from-swami','GuruController@messageFromSwami');
	Route::get('write-to-swami','GuruController@writeToSwami');
});

/*
|
|	courses routes
|
*/
Route::group(['prefix' => 'courses-and-retreats'],function(){
	Route::get('/','CoursesAndRetreatsController@index');
	Route::get('for-children','CoursesAndRetreatsController@children');
	Route::get('for-seniors','CoursesAndRetreatsController@seniors');
});

/*
|
|	publications listing
|
*/
Route::group(['prefix' => 'publications'],function(){
	Route::get('/','PublicationsController@index');
	Route::group(['prefix' => 'cds-dvds'],function(){
		Route::get('dvds','PublicationsController@dvdList');
		Route::get('vcds','PublicationsController@vcdList');
		Route::get('audio-cds','PublicationsController@audiodList');
	});
	Route::group(['prefix' => 'books'],function(){
		Route::get('books-by-swami','PublicationsController@booksBySwami');
		Route::get('other-titles','PublicationsController@otherTitles');
	});
	Route::get('piravi-magazine','PublicationsController@piravi');
});

/*
|
|	spiritual journeys
|
*/
Route::group(['prefix' => 'spiritual-journeys'],function(){
	Route::group(['prefix' => 'kailas-yatra'],function(){
		Route::get('/','yatras@kailasHighlights');
		Route::get('highlights','yatras@kailasHighlights');
		Route::get('itinerary-and-cost','yatras@kailasDetails');
		Route::get('registration','yatras@Registration');
	});
	Route::group(['prefix' => 'himalaya-yatra'],function(){
		Route::get('/','yatras@himalayaHighlights');
		Route::get('highlights','yatras@himalayaHighlights');
		Route::get('itinerary-and-cost','yatras@himalayaDetails');
		Route::get('registration','yatras@Registration');
	});
	Route::group(['prefix' => 'amarnath-yatra'],function(){
		Route::get('/','yatras@amarnathHighlights');
		Route::get('highlights','yatras@amarnathHighlights');
		Route::get('itinerary-and-cost','yatras@amarnathDetails');
		Route::get('registration','yatras@Registration');
	});
	Route::get('other-yathras','yatras@other');
	Route::get('yathris-speak','yatras@testimonials');

});

/*
|
|	Donate
|
*/
Route::get('donate-support','donate@index');

/*
|
|	e-shop
|
*/
Route::group(['prefix' => 'e-shop'],function(){
	Route::get('/','PublicationsController@index');
	Route::get('cart','ShoppingCart@index');
});

/*
|
|	gita family
|
*/
Route::get('gita-family','GitaFamily@index');

/*
|
|	contact us
|
*/
Route::get('contact-us','ContactUs@index');


