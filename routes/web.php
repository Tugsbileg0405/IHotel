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
Route::get('change/{locale}', function($locale) {
	Session::put('locale', $locale);
	return back();
});

Route::group(['middleware' => 'locale'], function() {
	Auth::routes();
	Route::get('user/activate', 'AppController@activateUser');
	Route::get('user/activation', 'AppController@showActivate');
	Route::get('user/activation/resend', 'AppController@sendActivate');
});

Route::group(['middleware' => ['locale', 'activated']], function() {
	Route::get('/', 'AppController@home');
	Route::get('/aspac', 'AppController@aspac');
	Route::get('question', 'AppController@showquestions');
	Route::get('post/{id}', 'AppController@showPost');
	Route::get('category/{id}', 'AppController@showCategory');
	Route::get('posts', 'AppController@showPosts');
	Route::get('posts/user/{id}', 'AppController@showUserPosts');
	Route::get('about', 'AppController@showAbout');
	Route::get('terms', 'AppController@showTerms');
	Route::get('contact', 'AppController@showContact');
	Route::post('feedback', 'AppController@storeFeedback');
	Route::get('search','SearchController@index');
	Route::get('searchresult','SearchController@searched');
	Route::post('favorite','SearchController@likeHotel');
	Route::get('api/allhotel','SearchController@allhotel');
	Route::get('search/hotel/search', 'SearchController@index');
	Route::get('checkhotels','SearchController@check');
	Route::get('search/hotel/{id}', [
	    'as' => 'search.hotel',
	    'uses' => 'SearchController@hotelInfo'
	]);

	Route::post('order', 'OrderController@order');

	Route::get('order/card', 'OrderController@showCard');
	Route::post('order/card/store', 'OrderController@storeCard');
	Route::get('order/success', 'OrderController@showSuccess');

	Route::group(['middleware' => 'auth'], function(){
		Route::get('hotel/create', 'HotelController@createHotel');
		Route::post('hotel/create', 'HotelController@storeHotel');
		Route::post('hotel/upload', 'HotelController@storePhoto');
		Route::post('hotel/upload/photos', 'HotelController@storePhoto');
		Route::post('hotel/room/upload/{id}', 'HotelController@storeUploadPhoto');
		Route::delete('hotel/room/{id}', 'HotelController@destroyRoom');
	});

	Route::group(['middleware' => ['auth', 'hotel', 'owner']], function() {
		Route::get('hotel/update/{id}', 'HotelController@editHotel');
		Route::post('hotel/update/{id}', 'HotelController@updateHotel');
		Route::get('hotel/service/{id}', 'HotelController@createHotelService')->middleware('step:2');
		Route::post('hotel/service/{id}', 'HotelController@storeHotelService')->middleware('step:2');
		Route::get('hotel/photo/{id}', 'HotelController@createHotelPhoto')->middleware('step:3');
		Route::post('hotel/photo/{id}', 'HotelController@storeHotelPhoto')->middleware('step:3');
		Route::get('hotel/room/{id}', 'HotelController@createRoom')->middleware('step:4');
		Route::post('hotel/room/{id}', 'HotelController@storeRoom')->middleware('step:4');
		Route::put('hotel/room/{rid}/{id}', 'HotelController@updateRoom')->middleware('step:4');
		Route::get('hotel/room/service/{id}', 'HotelController@createRoomService')->middleware('step:4');
		Route::post('hotel/room/service/{id}', 'HotelController@storeRoomService')->middleware('step:5');
		Route::get('hotel/room/photo/{id}', 'HotelController@createRoomPhoto')->middleware('step:6');
		Route::post('hotel/room/photo/{id}', 'HotelController@storeRoomPhoto')->middleware('step:6');
		Route::get('hotel/payment/{id}', 'HotelController@createPayment');
		Route::post('hotel/payment/{id}', 'HotelController@storePayment');
		Route::get('hotel/contract/{id}', 'HotelController@createContract')->middleware('step:7');
		Route::post('hotel/contract/{id}', 'HotelController@storeContract')->middleware('step:7');
	});

	Route::group(['middleware' => 'auth'], function() {
		Route::get('profile', 'PostController@index');
		Route::get('profile/edit', 'UserController@editProfile');
		Route::put('profile', 'UserController@storeProfile');
		Route::post('profile/update/photo', 'UserController@storePhoto');
		Route::get('profile/edit/password', 'UserController@editPassword');
		Route::put('profile/password', 'UserController@storePassword');
		Route::resource('profile/posts', 'PostController', ['except' => [
			'index', 'show',
		]]);
		Route::post('profile/post/photo', 'PostController@storePhoto');
		Route::get('profile/rate', 'UserController@showRate');
		Route::get('profile/rate/create/{id}', 'UserController@createRate');
		Route::post('profile/rate/{id}', 'UserController@storeRate');
		Route::post('profile/review/{id}', 'UserController@storeReview');
		Route::get('profile/orders', 'UserController@showOrders');
		Route::post('profile/orders/cancel/{id}', 'UserController@cancelOrder');
		Route::post('comment/{id}', 'AppController@storeComment');
	});

	Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'profile', 'namespace' => 'Admin'], function() {
		Route::resource('hotelcategory', 'HotelCategoryController', ['except' => [
			'show',
		]]);
		Route::resource('roomcategory', 'RoomCategoryController', ['except' => [
			'show',
		]]);
		Route::resource('hotelservicecategory', 'HotelServiceCategoryController', ['except' => [
			'show',
		]]);
		Route::resource('roomservicecategory', 'RoomServiceCategoryController', ['except' => [
			'show',
		]]);
		Route::resource('hotelservice', 'HotelServiceController', ['except' => [
			'index', 'show', 'create',
		]]);
		Route::get('hotelservice/{id}', 'HotelServiceController@index');
		Route::get('hotelservice/create/{id}', 'HotelServiceController@create');

		Route::resource('roomservice', 'RoomServiceController', ['except' => [
			'index', 'show', 'create',
		]]);
		Route::get('roomservice/{id}', 'RoomServiceController@index');
		Route::get('roomservice/create/{id}', 'RoomServiceController@create');
		
		Route::resource('comment', 'CommentController', ['except' => [
			'show',
		]]);
		Route::resource('question', 'QuestionController', ['except' => [
			'show',
		]]);
		Route::resource('information', 'InformationController', ['except' => [
			'show',
		]]);
		Route::resource('post', 'PostController', ['only' => [
			'index', 'destroy',
		]]);
		Route::resource('postcategory', 'PostCategoryController', ['except' => [
			'show',
		]]);
		Route::resource('postcomment', 'PostCommentController', ['only' => [
			'index', 'destroy',
		]]);
		Route::resource('term', 'TermController', ['except' => [
			'show',
		]]);
		Route::resource('team', 'TeamController', ['except' => [
			'show',
		]]);
		Route::resource('pickup', 'PickupController', ['except' => [
			'show',
		]]);
		Route::get('dollarrate', 'OptionController@dollarrate');
		Route::get('option', 'OptionController@edit');
		Route::put('option', 'OptionController@update');

		Route::resource('hotel', 'HotelController', ['only' => [
			'index', 'destroy', 'update',
		]]);
		Route::resource('order', 'OrderController', ['except' => [
			'create', 'store', 'show',
		]]);
		Route::post('order/search', 'OrderController@search');
		Route::resource('user', 'UserController', ['only' => [
			'index', 'edit', 'update',
		]]);

		Route::post('hotelcategory/search', 'HotelCategoryController@search');
		Route::post('hotelservicecategory/search', 'HotelServiceCategoryController@search');
		Route::post('hotelservice/search', 'HotelServiceController@search');
		Route::post('roomcategory/search', 'RoomCategoryController@search');
		Route::post('roomservicecategory/search', 'RoomServiceCategoryController@search');
		Route::post('roomservice/search', 'RoomServiceController@search');
		Route::post('hotel/search', 'HotelController@search');
		Route::post('postcategory/search', 'PostCategoryController@search');
		Route::post('post/search', 'PostController@search');
		Route::post('postcomment/search', 'PostCommentController@search');
		Route::post('question/search', 'QuestionController@search');
		Route::post('information/search', 'InformationController@search');
		Route::post('comment/search', 'CommentController@search');
		Route::post('term/search', 'TermController@search');
		Route::post('team/search', 'TeamController@search');
		Route::post('user/search', 'UserController@search');

		Route::post('comment/photo', 'CommentController@storePhoto');
		Route::post('information/photo', 'InformationController@storePhoto');
		Route::post('team/photo', 'TeamController@storePhoto');
	});

	Route::group(['middleware' => ['auth', 'hotel', 'owner']], function() {
		Route::get('admin/hotel/{id}', 'AdminController@showHotel');
		Route::get('admin/hotel/service/{id}', 'AdminController@showHotelService')->middleware('step:3');
		Route::get('admin/hotel/photo/{id}', 'AdminController@showHotelPhoto')->middleware('step:4');
		Route::get('admin/hotel/payment/{id}', 'AdminController@showHotelPayment')->middleware('step:7');

		Route::get('admin/hotel/en/{id}', 'AdminController@showHotelEn');
		Route::post('admin/hotel/en/{id}', 'AdminController@storeHotelEn');

		Route::get('admin/hotel/rooms/{id}', 'AdminController@showRooms');
		Route::get('admin/hotel/rating/{id}', 'AdminController@showRating');
		Route::get('admin/hotel/order/{id}', 'AdminController@showOrder');
		Route::get('admin/hotel/order/{id}/{rid}', 'AdminController@showSingleOrder');
		Route::post('admin/hotel/order/search/{id}', 'AdminController@searchOrder');
	});

	Route::group(['middleware' => ['auth', 'hotel']], function() {
		Route::get('profile/hotels', 'UserController@showHotels');
		Route::post('admin/hotel/room/close/{id}', 'AdminController@closeRoom');
		Route::delete('admin/hotel/room/close/{id}', 'AdminController@cancelClose');
		Route::post('admin/hotel/room/close/check/{id}', 'AdminController@checkClose');
		Route::post('admin/hotel/room/sale/{id}', 'AdminController@saleRoom');
		Route::delete('admin/hotel/room/sale/{id}', 'AdminController@cancelSale');
		Route::post('admin/hotel/room/sale/check/{id}', 'AdminController@checkSale');
	});
});
