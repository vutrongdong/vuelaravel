<?php

namespace App\Repository\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $table = 'products';

	protected $fillable = [
		'name',
		'slug',
		'price',
		'cate_id',
		'description',
		'image',
		'promotion',
		'quantity',
		'status',
		'warranty',
	];
}
