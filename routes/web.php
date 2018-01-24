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

Route::get('/', function () {
    return view('welcome');
});
// public
Route::group(['prefix'=>''], function(){
	//index
	Route::get('', ['as'=>'public.getIndex', 'uses'=>'IndexController@getIndex']);
	//product
	Route::group(['prefix'=>'san-pham'], function(){
		Route::get('', ['as'=>'public.product.getIndex', 'uses'=>'ProductController@getIndex']);
		Route::get('{slug}', ['as'=>'public.product.getPro', 'uses'=>'ProductController@getPro']);
		Route::get('{slug}/{slug1}', ['as'=>'public.product.getDetail', 'uses'=>'ProductController@getDetail']);
	});
	//post
	Route::group(['prefix'=>'goc-chia-se'], function(){
		Route::get('', ['as'=>'public.post.getIndex', 'uses'=>'PostController@getIndex']);
		Route::get('{slug}', ['as'=>'public.post.getPost', 'uses'=>'PostController@getPost']);
		Route::get('{slug}/{slug1}', ['as'=>'public.post.getDetail', 'uses'=>'PostController@getDetail']);
	});
	//contact
	Route::group(['prefix'=>'lien-he'], function(){
		Route::get('', ['as'=>'public.post.getIndex', 'uses'=>'ContactController@getIndex']);
		Route::post('', ['as'=>'public.post.postSend', 'uses'=>'ContactController@postSend']);
	});
});
// admin
Route::group(['prefix'=>'adgoldfish185'], function(){
	Route::get('', ['as'=>'adgoldfish185.getIndex', 'uses'=>'admin\IndexController@getIndex']);

	/************************************************/
	//users
	Route::group(['prefix'=>'nguoi-dung'], function(){
		Route::get('', ['as'=>'adgoldfish185.user.getIndex', 'uses'=>'admin\UserController@getIndex']);
		//add
		Route::get('add', ['as'=>'adgoldfish185.user.getAdd', 'uses'=>'admin\UserController@getAdd']);
		Route::post('add', ['as'=>'adgoldfish185.user.postAdd', 'uses'=>'admin\UserController@postAdd']);
		//edit
		Route::get('edit/{id}', ['as'=>'adgoldfish185.user.getEdit', 'uses'=>'admin\UserController@getEdit']);
		Route::post('edit/{id}', ['as'=>'adgoldfish185.user.postEdit', 'uses'=>'admin\UserController@postEdit']);
		//del
		Route::get('del/{id}', ['as'=>'adgoldfish185.user.getDel', 'uses'=>'admin\UserController@getDel']);
		//active
		Route::get('active', ['as'=>'adgoldfish185.user.getActive', 'uses'=>'admin\UserController@getActive']);
	});

	//level
	Route::group(['prefix'=>'cap-bac'], function(){
		Route::get('', ['as'=>'adgoldfish185.level.getIndex', 'uses'=>'admin\UserController@getIndexLevel']);
		//add
		Route::get('add', ['as'=>'adgoldfish185.level.getAddLevel', 'uses'=>'admin\UserController@getAddLevel']);
		Route::post('add', ['as'=>'adgoldfish185.level.postAddLevel', 'uses'=>'admin\UserController@postAddLevel']);
		//edit
		Route::get('edit-{id}', ['as'=>'adgoldfish185.level.getEditLevel', 'uses'=>'admin\UserController@getEditLevel']);
		Route::post('edit-{id}', ['as'=>'adgoldfish185.level.postEditLevel', 'uses'=>'admin\UserController@postEditLevel']);
		//del
		Route::get('del-{id}', ['as'=>'adgoldfish185.level.getDelLevel', 'uses'=>'admin\UserController@getDelLevel']);
	});

	/************************************************/
	//product
	Route::group(['prefix'=>'san-pham'], function(){
		Route::get('', ['as'=>'adgoldfish185.product.getIndex', 'uses'=>'admin\ProductController@getIndex']);
		//add
		Route::get('add', ['as'=>'adgoldfish185.product.getAdd', 'uses'=>'admin\ProductController@getAdd']);
		Route::post('add', ['as'=>'adgoldfish185.product.postAdd', 'uses'=>'admin\ProductController@postAdd']);
		//edit
		Route::get('edit-{id}', ['as'=>'adgoldfish185.product.getEdit', 'uses'=>'admin\ProductController@getEdit']);
		Route::post('edit-{id}', ['as'=>'adgoldfish185.product.postEdit', 'uses'=>'admin\ProductController@postEdit']);
		//del
		Route::get('del-{id}', ['as'=>'adgoldfish185.product.getDel', 'uses'=>'admin\ProductController@getDel']);
		//Active
		Route::get('active', ['as'=>'adgoldfish185.product.getActive', 'uses'=>'admin\ProductController@getActive']);
		//Delimg
		Route::get('delimg', ['as'=>'adgoldfish185.product.getDelImg', 'uses'=>'admin\ProductController@getDelImg']);
	});

	//category
	Route::group(['prefix'=>'danh-muc-sp'], function(){
		Route::get('', ['as'=>'adgoldfish185.product.getIndexCate', 'uses'=>'admin\ProductController@getIndexCate']);
		//add
		Route::get('add', ['as'=>'adgoldfish185.product.getAddCate', 'uses'=>'admin\ProductController@getAddCate']);
		Route::post('add', ['as'=>'adgoldfish185.product.postAddCate', 'uses'=>'admin\ProductController@postAddCate']);
		//edit
		Route::get('edit-{id}', ['as'=>'adgoldfish185.product.getEditCate', 'uses'=>'admin\ProductController@getEditCate']);
		Route::post('edit-{id}', ['as'=>'adgoldfish185.product.postEditCate', 'uses'=>'admin\ProductController@postEditCate']);
		//del
		Route::get('del-{id}', ['as'=>'adgoldfish185.product.getDelCate', 'uses'=>'admin\ProductController@getDelCate']);
		//Active
		Route::get('active', ['as'=>'adgoldfish185.product.getActiveCate', 'uses'=>'admin\ProductController@getActiveCate']);
	});

	/************************************************/
	//post
	Route::group(['prefix'=>'bai-viet'], function(){
		Route::get('', ['as'=>'adgoldfish185.post.getIndex', 'uses'=>'admin\PostController@getIndex']);
		//add
		Route::get('add', ['as'=>'adgoldfish185.post.getAdd', 'uses'=>'admin\PostController@getAdd']);
		Route::post('add', ['as'=>'adgoldfish185.post.postAdd', 'uses'=>'admin\PostController@postAdd']);
		//edit
		Route::get('edit-{id}', ['as'=>'adgoldfish185.post.getEdit', 'uses'=>'admin\PostController@getEdit']);
		Route::post('edit-{id}', ['as'=>'adgoldfish185.post.postEdit', 'uses'=>'admin\PostController@postEdit']);
		//del
		Route::get('del-{id}', ['as'=>'adgoldfish185.post.getDel', 'uses'=>'admin\PostController@getDel']);
		//Active
		Route::get('active', ['as'=>'adgoldfish185.post.getActive', 'uses'=>'admin\PostController@getActive']);
	});

	//cate post
	Route::group(['prefix'=>'danh-muc-bv'], function(){
		Route::get('', ['as'=>'adgoldfish185.post.getIndexCate', 'uses'=>'admin\PostController@getIndexCate']);
		//add
		Route::get('add', ['as'=>'adgoldfish185.post.getAddCate', 'uses'=>'admin\PostController@getAddCate']);
		Route::post('add', ['as'=>'adgoldfish185.post.postAddCate', 'uses'=>'admin\PostController@postAddCate']);
		//edit
		Route::get('edit-{id}', ['as'=>'adgoldfish185.post.getEditCate', 'uses'=>'admin\PostController@getEditCate']);
		Route::post('edit-{id}', ['as'=>'adgoldfish185.post.postEditCate', 'uses'=>'admin\PostController@postEditCate']);
		//del
		Route::get('del-{id}', ['as'=>'adgoldfish185.post.getDelCate', 'uses'=>'admin\PostController@getDelCate']);
		//Active
		Route::get('active', ['as'=>'adgoldfish185.post.getActiveCate', 'uses'=>'admin\PostController@getActiveCate']);
	});

	/************************************************/
	//slide
	Route::group(['prefix'=>'slide'], function(){
		Route::get('', ['as'=>'adgoldfish185.slide.getIndex', 'uses'=>'admin\SlideController@getIndex']);
		//add
		Route::get('add', ['as'=>'adgoldfish185.slide.getAdd', 'uses'=>'admin\SlideController@getAdd']);
		Route::post('add', ['as'=>'adgoldfish185.slide.postAdd', 'uses'=>'admin\SlideController@postAdd']);
		//edit
		Route::get('edit-{id}', ['as'=>'adgoldfish185.slide.getEdit', 'uses'=>'admin\SlideController@getEdit']);
		Route::post('edit-{id}', ['as'=>'adgoldfish185.slide.postEdit', 'uses'=>'admin\SlideController@postEdit']);
		//del
		Route::get('del-{id}', ['as'=>'adgoldfish185.slide.getDel', 'uses'=>'admin\SlideController@getDel']);
		//active
		Route::get('active', ['as'=>'adgoldfish185.slide.getActive', 'uses'=>'admin\SlideController@getActive']);
	});

	/************************************************/
	//contact
	Route::group(['prefix'=>'contact'], function(){
		Route::get('', ['as'=>'adgoldfish185.contact.getIndex', 'uses'=>'admin\ContactController@getIndex']);
		//edit
		Route::get('detail-{id}', ['as'=>'adgoldfish185.contact.getDetail', 'uses'=>'admin\ContactController@getDetail']);
		//del
		Route::get('del-{id}', ['as'=>'adgoldfish185.contact.getDel', 'uses'=>'admin\ContactController@getDel']);
	});
});
