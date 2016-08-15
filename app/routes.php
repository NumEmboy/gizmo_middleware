<?php
Route::any('api/v1/signin', [
	'as' => 'user.signin',
	'uses' => 'UserController@postSignIn'
]);

Route::post('api/v1/categories/delete', [
	'as' => 'categories.delete',
	'uses' => 'CategoryController@destroy'
]);

Route::post('api/v1/users/delete', [
	'as' => 'users.delete',
	'uses' => 'UserController@destroy'
]);

Route::group(['prefix' => 'api/v1'], function()
{
	Route::get('categories/{id}/products', 'ProductController@index');
	Route::resource('users', 'UserController');
	Route::resource('products', 'ProductController', ['only' => ['index', 'show', 'store']]);
	Route::resource('categories', 'CategoryController', ['only' => ['index', 'show','store','edit']]);
});

// Route::post('/signin', [
// 	'uses' => 'UsersController@postSignIn',
// 	'as' => 'user.signin'
// ]);
