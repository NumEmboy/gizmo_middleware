<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends \Eloquent {

	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	/**
	 * prevent mass assigment operation
	 * @var protected $fillable array
	 */
	protected $fillable = ['name'];
	
	/**
	 * Set validation rules
	 * @var public $rules array
	 */
	public static $rules = [
		'name' => 'required|min:3'
	];

	/**
	 * Category has many products
	 * @return products
	 */
	public function products() {
		return $this->hasMany('Product');
	}
}