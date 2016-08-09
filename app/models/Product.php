<?php

class Product extends \Eloquent {

	/**
	 * prevent mass assigment operation
	 * @var protected $fillable array
	 */
	protected $fillable = [
		'category_id',
		'title',
		'description',
		'price',
		'availability',
		'imagePath'
	];

	/**
	 * Set validation rules
	 * @var public $rules array
	 */
	public static $rules = [
		'category_id' 	=> 'required|integer',
		'title' 		=> 'required|min:6',
		'description'	=> 'required|min:20',
		'price'			=> 'required|integer',
		'availability'	=> 'integer',
		'imagePath'		=> 'required|image|mimes:jpeg,jpg,png'
	];

	public function category() {
		return $this->belongsTo('Category');
	}
}