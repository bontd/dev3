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

Route::get('/','NewsController@index');
//Route::group(['middleware'=>'myAuth'],function(){
	Route::group(['prefix'=>'/articles'],function (){
		Route::get('/','ArticleController@index');
		Route::get('/test-post','ArticleController@testpost');
		Route::post('/test-post','ArticleController@store');
		Route::get('/delete','ArticleController@destroy');
		Route::get('/edit/{id}','ArticleController@edit');
		Route::post('/edit/{id}','ArticleController@update');
		Route::get('/view/{id}','ArticleController@view');
		});
	Route::get('/contact', 'PagesController@contact');
	Route::get('/about', 'PagesController@about');
	Route::get('/abouttime', 'PagesController@abouttime');
	Route::get('/articles/test','ArticleController@test');
	Route::get('/thamSo/{data}','ArticleController@Hoc');

	Route::group(['prefix'=>'/admin'],function (){
		Route::get('/index','AuthController@index');
		Route::get('/login', 'AuthController@viewlogin');
		Route::post('/login','AuthController@login');
		Route::post('/test-ajax','AuthController@active');
		Route::get('/delete/{id}','AuthController@destroy');
		Route::get('/edit/{id}','AuthController@edit');
		Route::post('/edit/{id}','AuthController@update');
		Route::get('/register','AuthController@adduser');
		Route::post('/register','AuthController@register');
		Route::get('/','AuthController@index');
		Route::get('/logout','AuthController@logout');
		Route::get('/view/{id}','AuthController@view');
	});
	//URL
	Route::get('/Request','ArticleController@GetURL');

	//post request
	//Route::get('/getForm','ArticleController@postForm');

	//test uploadfile
	Route::get('/articles/uploadFile',function(){
		return view('articles/postFile');
	});
	Route::post('articles/postFile',['as'=>'postFile', 'uses'=>'ArticleController@postFile']);
	//auth
	
	
	Route::group(['middleware'=>'web'], function(){
		
	});
	Route::get('/admin/mail', function(){
		return view('admin/mailtest');
	});
	Route::get('/articles/testpopup',function(){
		return view('admin/test');
	});
	Route::get('/articles/javascrip',function(){
		return view('admin/menu');
	});

	Route::group(['prefix'=>'news'],function (){
		Route::get('/','NewsController@index');
		Route::get('/detail/{id}','NewsController@view');
		Route::get('/category/detail/{id}','NewsController@view');
		Route::get('/category/{id}','NewsController@category');
	});
	
	Route::group(['prefix'=>'admin-news'],function (){
		Route::get('/','AdminNewController@index');
		Route::get('/view/{id}','AdminNewController@view');
		Route::post('/delete','AdminNewController@delete');
		Route::get('/edit/{id}','AdminNewController@edit');
		Route::post('/edit/{id}','AdminNewController@update');
		Route::get('/add','AdminNewController@add');
		Route::post('/add','AdminNewController@addaction');
	});
	Route::group(['prefix'=>'categories'],function(){
		Route::get('/','CategoriesController@index');
		Route::get('/view/{id}','CategoriesController@view');
		Route::get('/add-categori','CategoriesController@add');
		Route::post('/add-categori','CategoriesController@addAction');
		Route::get('/edit/{id}','CategoriesController@edit');
		Route::post('/edit/{id}','CategoriesController@update');
		Route::get('/delete/{id}','CategoriesController@delete');
	});
	Route::group(['prefix'=>'types'],function(){
		Route::get('/','TypeController@index');
		Route::get('/view/{id}','TypeController@view');
		Route::get('/add','TypeController@add');
		Route::post('/add','TypeController@addAction');
		Route::get('/edit/{id}','TypeController@edit');
		Route::post('/edit/{id}','TypeController@editAction');
		Route::post('/delete','TypeController@delete');
	});
	Route::get('news/login',function (){
		return view('news/login');
	});
	Route::get('ajax','TypeController@ajax');
	Route::post('ajax/test-ajax','TypeController@deleteAjax');
	
//});