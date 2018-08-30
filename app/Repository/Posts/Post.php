<?php

namespace App\Repository\Posts;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
	protected $table = 'posts';

	protected $fillable = ['title', 'body', 'user_id'];
}
