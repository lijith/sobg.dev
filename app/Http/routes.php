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
|	Event Display
|
*/
Route::group(['prefix' => 'events'],function(){
	Route::get('/',['as' => 'events', 'uses' => 'EventController@index']);
  Route::get('/{title}',['as' => 'event.show', 'uses' => 'EventController@show']);
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
	Route::get('registration/{yatra}',['as' => 'Registration', 'uses' => 'YatrasController@Registration']);
	Route::get('other-yathras',['as' => 'otherYatras', 'uses' => 'YatrasController@otherYatras']);
	Route::get('yathris-speak',['as' => 'testimonials', 'uses' => 'YatrasController@testimonials']);

});

/*
|
|	Donate
|
*/
Route::get('donate-support',['as' => 'donate', 'uses' => 'DonateController@index']);

/*
|
| profile
|
*/



/*
|
|	e-shop
|
*/
Route::group(['prefix' => 'e-shop'],function(){
	Route::get('/',['as' => 'eshop', 'uses' => 'EshopController@index']);
  Route::get('/audio-disks',['as' => 'eshop.audios', 'uses' => 'EshopController@audioList']);
  Route::get('/video-disks',['as' => 'eshop.videos', 'uses' => 'EshopController@videoList']);
	Route::get('vcds',['as' => 'vcd', 'uses' => 'EshopController@vcdList']);
	Route::get('vcds/{title}',['as' => 'vcd.show', 'uses' => 'EshopController@VideoShow']);
	Route::get('dvds',['as' => 'dvd', 'uses' => 'EshopController@dvdList']);
	Route::get('dvds/{title}',['as' => 'dvd.show', 'uses' => 'EshopController@VideoShow']);
	Route::get('mp3',['as' => 'mp3', 'uses' => 'EshopController@mp3List']);
	Route::get('mp3/{title}',['as' => 'mp3.show', 'uses' => 'EshopController@audioShow']);
	Route::get('audio-cds',['as' => 'acd', 'uses' => 'EshopController@acdList']);
	Route::get('audio-cds/{title}',['as' => 'acd.show', 'uses' => 'EshopController@audioShow']);
	Route::group(['prefix' => 'books'],function(){
		Route::get('/',['as' => 'books', 'uses' => 'EshopController@bookList']);
		Route::get('/{title}',['as' => 'book.show', 'uses' => 'EshopController@BookShow']);
		Route::get('books-by-swami',['as' => 'swamibooks', 'uses' => 'EshopController@booksBySwami']);
		Route::get('other-titles',['as' => 'otherbooks', 'uses' => 'EshopController@otherTitles']);
	});
	Route::get('piravi-magazine',['as' => 'piravi', 'uses' => 'EshopController@piravi']);
	Route::get('piravi-magazine/{title}',['as' => 'magazine.show', 'uses' => 'EshopController@piraviShow']);
  
  Route::group(['prefix' => 'cart'],function(){
    Route::get('/',['as' => 'cart', 'uses' => 'ShoppingCartController@showCart']);
    Route::post('/',['as' => 'cart.add', 'uses' => 'ShoppingCartController@add']);
    Route::post('shipping-charge',['as' => 'cart.shipping-charge', 'uses' => 'ShoppingCartController@updateShippingCharges']);
    Route::put('/{hash}',['as' => 'cart.update', 'uses' => 'ShoppingCartController@update']);
    Route::delete('/{hash}',['as' => 'cart.remove', 'uses' => 'ShoppingCartController@removeItem']);

    Route::get('account',['as' => 'cart.account', 'uses' => 'Member\SessionController@cartAccount']);
    Route::post('account/login', ['as' => 'member.cart.login', 'uses' => 'Member\SessionController@cartStore']);
    Route::post('account/register', ['as' => 'member.cart.register', 'uses' => 'Member\RegistrationController@register']);
    Route::get('shipping',['as' => 'cart.shipping', 'uses' => 'ShoppingCartController@showShipping']);
    Route::post('shipping',['as' => 'cart.shipping.store', 'uses' => 'ShoppingCartController@storeShipping']);
    Route::get('shipping/edit',['as' => 'cart.shipping.edit', 'uses' => 'ShoppingCartController@editShipping']);
    Route::put('shipping/edit',['as' => 'cart.shipping.update', 'uses' => 'ShoppingCartController@updateShipping']);
    Route::get('payment',['as' => 'cart.pay', 'uses' => 'ShoppingCartController@showPayment']);


  });

  Route::get('search',['as' => 'search.eshop', 'uses' => 'EshopController@search']);



});


/*
|
| Site Memebers
|
*/
Route::group(['prefix'=>'member', 'namespace' => 'Member'], function(){
  Route::get('/', ['as' => 'member', 'uses' => 'SessionController@create']);
  Route::get('login', ['as' => 'member.login', 'uses' => 'SessionController@create']);
  Route::get('logout', ['as' => 'member.logout', 'uses' => 'SessionController@destroy']);
  Route::get('sessions/create', ['as' => 'member.session.create', 'uses' => 'SessionController@create']);
  Route::post('sessions/store', ['as' => 'member.session.store', 'uses' => 'SessionController@store']);
  Route::delete('sessions/destroy', ['as' => 'member.session.destroy', 'uses' => 'SessionController@destroy']);



  // Sentinel Registration
  Route::get('register', ['as' => 'member.register.form', 'uses' => 'RegistrationController@registration']);
  Route::post('register', ['as' => 'member.register.user', 'uses' => 'RegistrationController@register']);
  Route::get('users/activate/{hash}/{code}', ['as' => 'member.activate', 'uses' => 'RegistrationController@activate']);
  Route::get('reactivate', ['as' => 'member.reactivate.form', 'uses' => 'RegistrationController@resendActivationForm']);
  Route::post('reactivate', ['as' => 'member.reactivate.send', 'uses' => 'RegistrationController@resendActivation']);
  Route::get('forgot', ['as' => 'member.forgot.form', 'uses' => 'RegistrationController@forgotPasswordForm']);
  Route::post('forgot', ['as' => 'member.reset.request', 'uses' => 'RegistrationController@sendResetPasswordEmail']);
  Route::post('reset/{hash}/{code}', ['as' => 'member.reset.password', 'uses' => 'RegistrationController@resetPassword']);

  // Sentinel Profile
  Route::get('profile', ['as' => 'member.profile.show', 'uses' => 'ProfileController@show']);
  Route::get('profile/edit', ['as' => 'member.profile.edit', 'uses' => 'ProfileController@edit']);
  Route::put('profile/personal', ['as' => 'member.profile.personalupdate', 'uses' => 'ProfileController@updatePersonal']);
  Route::put('profile/address', ['as' => 'member.profile.addressupdate', 'uses' => 'ProfileController@updateAddress']);
  Route::post('profile/password', ['as' => 'member.profile.password', 'uses' => 'ProfileController@changePassword']);
});

/*
|
|	gita family
|
*/
Route::get('gita-family',['as' => 'gitafamily', 'uses' => 'GitaFamilyController@index']);

/*
|
|	contact us
|
*/
Route::get('contact-us',['as' => 'contact', 'uses' => 'ContactUsController@index']);
Route::post('contact-us',['as' => 'contact-post', 'uses' => 'ContactUsController@sendMessage']);

/*
|
|	contact us
|
*/
Route::get('bhavishya',['as' => 'bhavishya', 'uses' => 'BhavishyaController@index']);


/*
|
| archives of news and events
|
*/
Route::get('news-archives',['as' => 'archives', 'uses' => 'ArchivesController@index']);
Route::get('news-archives/{type}/{slug}',['as' => 'archive.showdetails', 'uses' => 'ArchivesController@show']);

/*
|
| Picture gallery
|
*/
Route::get('photo-album',['as' => 'photo.albums', 'uses' => 'PhotoAlbumsController@index']);
Route::get('photo-album/{slug}',['as' => 'photo.album.show', 'uses' => 'PhotoAlbumsController@show']);


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

  //Events Routes
  Route::get('events/create', ['as' => 'events.create', 'uses' => 'EventController@create']);
  Route::post('events', ['as' => 'events.store', 'uses' => 'EventController@store']);
  Route::get('events', ['as' => 'events.list', 'uses' => 'EventController@index']);
  Route::get('events/{hash}', ['as' => 'events.show', 'uses' => 'EventController@show']);
  Route::get('events/{hash}/edit', ['as' => 'events.edit', 'uses' => 'EventController@edit']);
  Route::put('events/{hash}', ['as' => 'events.update', 'uses' => 'EventController@update']);
  Route::delete('events/{hash}', ['as' => 'events.destroy', 'uses' => 'EventController@destroy']);

  //ARchives
  Route::get('archives/create', ['as' => 'archives.create', 'uses' => 'ArchiveController@create']);
  Route::post('archives', ['as' => 'archives.store', 'uses' => 'ArchiveController@store']);
  Route::get('archives', ['as' => 'archives.list', 'uses' => 'ArchiveController@index']);
  Route::get('archives/{hash}', ['as' => 'archives.show', 'uses' => 'ArchiveController@show']);
  Route::get('archives/{hash}/edit', ['as' => 'archives.edit', 'uses' => 'ArchiveController@edit']);
  Route::put('archives/{hash}', ['as' => 'archives.update', 'uses' => 'ArchiveController@update']);
  Route::delete('archives/{hash}', ['as' => 'archives.destroy', 'uses' => 'ArchiveController@destroy']);

  //Dvds and Vcds Routes
  Route::get('videodisks/create', ['as' => 'videodisks.create', 'uses' => 'VideoDiskController@create']);
  Route::post('videodisks', ['as' => 'videodisks.store', 'uses' => 'VideoDiskController@store']);
  Route::get('videodisks/', ['as' => 'videodisks.list', 'uses' => 'VideoDiskController@index']);
  Route::get('videodisks/type/{type}', ['as' => 'videodisks.list.type', 'uses' => 'VideoDiskController@index']);
  Route::get('videodisks/{hash}', ['as' => 'videodisks.show', 'uses' => 'VideoDiskController@show']);
  Route::get('videodisks/{hash}/edit', ['as' => 'videodisks.edit', 'uses' => 'VideoDiskController@edit']);
  Route::put('videodisks/{hash}', ['as' => 'videodisks.update', 'uses' => 'VideoDiskController@update']);
  Route::delete('videodisks/{hash}', ['as' => 'videodisks.destroy', 'uses' => 'VideoDiskController@destroy']);

  //Audio cds and MP3 Routes
  Route::get('audiodisks/create', ['as' => 'audiodisks.create', 'uses' => 'AudioDiskController@create']);
  Route::post('audiodisks', ['as' => 'audiodisks.store', 'uses' => 'AudioDiskController@store']);
  Route::get('audiodisks/', ['as' => 'audiodisks.list', 'uses' => 'AudioDiskController@index']);
  Route::get('audiodisks/type/{type}', ['as' => 'audiodisks.list.type', 'uses' => 'AudioDiskController@index']);
  Route::get('audiodisks/{hash}', ['as' => 'audiodisks.show', 'uses' => 'AudioDiskController@show']);
  Route::get('audiodisks/{hash}/edit', ['as' => 'audiodisks.edit', 'uses' => 'AudioDiskController@edit']);
  Route::put('audiodisks/{hash}', ['as' => 'audiodisks.update', 'uses' => 'AudioDiskController@update']);
  Route::delete('audiodisks/{hash}', ['as' => 'audiodisks.destroy', 'uses' => 'AudioDiskController@destroy']);
  
  //Books
  Route::get('books/create', ['as' => 'books.create', 'uses' => 'BookController@create']);
  Route::post('books', ['as' => 'books.store', 'uses' => 'BookController@store']);
  Route::get('books/', ['as' => 'books.list', 'uses' => 'BookController@index']);
  Route::get('books/type/{type}', ['as' => 'books.list.type', 'uses' => 'BookController@index']);
  Route::get('books/{hash}', ['as' => 'books.show', 'uses' => 'BookController@show']);
  Route::get('books/{hash}/edit', ['as' => 'books.edit', 'uses' => 'BookController@edit']);
  Route::put('books/{hash}', ['as' => 'books.update', 'uses' => 'BookController@update']);
  Route::delete('books/{hash}', ['as' => 'books.destroy', 'uses' => 'BookController@destroy']);

  //magazine
  Route::get('magazine/create', ['as' => 'magazines.create', 'uses' => 'MagazineController@create']);
  Route::post('magazine', ['as' => 'magazines.store', 'uses' => 'MagazineController@store']);
  Route::get('magazine/', ['as' => 'magazines.list', 'uses' => 'MagazineController@index']);
  Route::get('magazine/subscription', ['as' => 'magazines.subscription.rates', 'uses' => 'MagazineController@subscription']);
  Route::put('magazine/subscription', ['as' => 'magazines.subscription.rates', 'uses' => 'MagazineController@updateSubscription']);
  Route::post('magazine/subscription', ['as' => 'magazines.subscription.rates', 'uses' => 'MagazineController@addsubscription']);
  Route::get('magazine/{hash}', ['as' => 'magazines.show', 'uses' => 'MagazineController@show']);
  Route::post('magazine/{hash}', ['as' => 'magazines.show', 'uses' => 'MagazineController@attach']);
  Route::get('magazine/{hash}/edit', ['as' => 'magazines.edit', 'uses' => 'MagazineController@edit']);
  Route::put('magazine/{hash}', ['as' => 'magazines.update', 'uses' => 'MagazineController@update']);
  Route::delete('magazine/{hash}', ['as' => 'magazines.destroy', 'uses' => 'MagazineController@destroy']);

  //photo albums
  Route::get('album/create', ['as' => 'album.create', 'uses' => 'AlbumController@create']);
  Route::post('album', ['as' => 'album.store', 'uses' => 'AlbumController@store']);
  Route::get('album/', ['as' => 'album.list', 'uses' => 'AlbumController@index']);
  Route::get('album/{hash}', ['as' => 'album.show', 'uses' => 'AlbumController@show']);
  Route::get('album/{hash}/edit', ['as' => 'album.edit', 'uses' => 'AlbumController@edit']);
  Route::put('album/{hash}', ['as' => 'album.update', 'uses' => 'AlbumController@update']);
  Route::delete('album/{hash}', ['as' => 'album.destroy', 'uses' => 'AlbumController@destroy']);
  Route::post('album/{hash}/upload', ['as' => 'album.photo.upload', 'uses' => 'AlbumController@addPhotos']);
  Route::delete('album/photo/{hash}', ['as' => 'album.photo.delete', 'uses' => 'AlbumController@removePhoto']);


  //yatras
  Route::get('yatra/create', ['as' => 'yatra.create', 'uses' => 'YatraController@create']);
  Route::post('yatra', ['as' => 'yatra.store', 'uses' => 'YatraController@store']);
  Route::get('yatra/', ['as' => 'yatra.list', 'uses' => 'YatraController@index']);
  Route::get('yatra/{part}/{hash}', ['as' => 'yatra.show', 'uses' => 'YatraController@show']);
  Route::get('yatra/{part}/{hash}/edit', ['as' => 'yatra.edit', 'uses' => 'YatraController@edit']);
  Route::put('yatra/{part}/{hash}', ['as' => 'yatra.update', 'uses' => 'YatraController@update']);
  Route::delete('yatra/{hash}', ['as' => 'yatra.destroy', 'uses' => 'YatraController@destroy']);

  //yatras
  Route::get('yatra-package/create', ['as' => 'package.create', 'uses' => 'PackageController@create']);
  Route::post('yatra-package', ['as' => 'package.store', 'uses' => 'PackageController@store']);
  Route::get('yatra-package/', ['as' => 'package.list', 'uses' => 'PackageController@index']);
  Route::get('yatra-package/{hash}/edit', ['as' => 'package.edit', 'uses' => 'PackageController@edit']);
  Route::put('yatra-package/{hash}', ['as' => 'package.update', 'uses' => 'PackageController@update']);
  Route::delete('yatra-package/{hash}', ['as' => 'package.destroy', 'uses' => 'PackageController@destroy']);

});

