<?php

class Category extends \Eloquent {
	protected $fillable = ['name'];

	public function products()
	{
		return $this->belongsToMany('Product');
	}
}