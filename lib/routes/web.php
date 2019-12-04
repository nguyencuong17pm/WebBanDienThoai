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

Route::get('/', 'FrontendController@getHome');

Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html', 'FrontendController@postComment');

Route::get('category/{id}/{slug}.html', 'FrontendController@getCate');

Route::get('search', 'FrontendController@getSearch');

Route::group(['prefix'=>'cart'], function(){
	Route::get('add/{id}', 'CartController@getAddCart');
	Route::get('show', 'CartController@getShowCart');
	Route::post('show', 'CartController@postComtplete');
	Route::get('delete/{id}', 'CartController@getCartDelete');
	Route::get('update', 'CartController@getUpdateCart');
	Route::get('complete', 'CartController@getComplete');
});

Route::group(['namespace'=>'admin'], function(){
	Route::group(['prefix'=>'login', 'middleware'=>'CheckLogedIn'], function(){
		Route::get('/', 'LoginController@getLogin');
		Route::post('/', 'LoginController@postLogin');
	});

	Route::group(['prefix'=>'doimatkhau', 'middleware'=>'CheckLogedOut'], function(){
		Route::get('{id}', 'LoginController@getdoimatkhau');
		Route::post('{id}', 'LoginController@postdoimatkhau');
	});

	Route::get('logout', 'HomeController@getLogout');

	Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogedOut'], function(){
		Route::get('home', 'HomeController@getHome');

		Route::group(['prefix'=>'slide'], function(){
			Route::get('/', 'SlideController@getSlide');
			Route::get('add', 'SlideController@getSlideAdd');
			Route::post('add', 'SlideController@postSlideAdd');
		});

		Route::group(['prefix'=>'category'], function(){
			Route::get('/', 'CategoryController@getCate');
			Route::post('/', 'CategoryController@postCate');

			Route::get('edit/{id}', 'CategoryController@getCateEdit');
			Route::post('edit/{id}', 'CategoryController@postCateEdit');

			Route::get('delete/{id}', 'CategoryController@getCateDelete');

		});


		Route::group(['prefix'=>'comment'], function(){
			Route::get('/', 'CommentController@getCom');
		});

		Route::group(['prefix'=>'khuyenmai'], function(){
			Route::get('/', 'KhuyenMaiController@getKhuyenMai');

			Route::get('edit/{id}', 'KhuyenMaiController@getEditKhuyenMai');
			Route::post('edit/{id}', 'KhuyenMaiController@postEditKhuyenMai');

			Route::get('delete/{id}', 'KhuyenMaiController@getDeleteKhuyenMai');

			Route::get('add', 'KhuyenMaiController@getAddKhuyenMai');
			Route::post('add', 'KhuyenMaiController@postAddKhuyenMai');
		});

		Route::group(['prefix'=>'bill'], function(){
			Route::get('/', 'BillController@getBill');

			Route::get('edit/{id}', 'BillController@getEditBill');
			Route::post('edit/{id}', 'BillController@postEditBill');

			Route::get('delete/{id}', 'BillController@getDelete');
		});

		Route::group(['prefix'=>'product'], function(){
			Route::get('/', 'ProductController@getProd');

			Route::get('add', 'ProductController@getProdAdd');
			Route::post('add', 'ProductController@postProdAdd');

			Route::get('addkhuyenmai', 'ProductController@getProdAddKhuyenmai');
			Route::post('addkhuyenmai', 'ProductController@postProdAddKhuyenmai');

			Route::get('edit/{id}', 'ProductController@getProdEdit');
			Route::post('edit/{id}', 'ProductController@postProdEdit');

			Route::get('editkhuyenmai/{id}', 'ProductController@getProdEditKhuyenmai');
			Route::post('editkhuyenmai/{id}', 'ProductController@postProdEditKhuyenmai');

			Route::post('/','ProductController@postProd');

			Route::get('delete/{id}', 'ProductController@getProdDelete');
		});
	});
});
