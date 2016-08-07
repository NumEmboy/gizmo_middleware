<?php

class Product extends \Eloquent {

	/**
	 * prevent mass assigment operation
	 * @var protected $fillable array
	 */
	protected $fillable = [
		'imagePath',
		'title',
		'description',
		'price'
	];


}