<?php
Route::any('api/v1/signin', [
	'as' => 'user.signin',
	'uses' => 'UsersController@postSignIn'
]);

Route::group(['prefix' => 'api/v1'], function()
{
	Route::get('categories/{id}/products', 'ProductController@index');
	Route::resource('users', 'UserController');
	Route::resource('products', 'ProductController', ['only' => ['index', 'show']]);
	Route::resource('categories', 'CategoryController', ['only' => ['index', 'show']]);
});

// Route::post('/signin', [
// 	'uses' => 'UsersController@postSignIn',
// 	'as' => 'user.signin'
// ]);
