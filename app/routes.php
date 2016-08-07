<?php
Route::any('api/v1/signin', [
	'as' => 'user.signin',
	'uses' => 'UsersController@postSignIn'
]);

Route::group(['prefix' => 'api/v1'], function()
{
	Route::resource('users', 'UsersController');
	Route::get('products', 'ProductController@index');
	Route::get('products/{id}', 'ProductController@show');
	// Route::post('/signin', [
	// 	'uses' => 'UsersController@postSignIn',
	// 	'as' => 'user.signin'
	// ]);
});
