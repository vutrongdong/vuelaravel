<?php

namespace App\Http\Controllers;
use App\Post;
use App\Repository\Posts\PostRepository;

class PostController extends Controller {
	protected $post;

	public function __construct(PostRepository $post) {
		return $this->post = $post;
	}

	public function show($id) {
		// $values = $this->post->getById($id);
		$values = Post::find($id);
		// dd($values->user_id);
		$this->authorize($values, 'view');
		return response()->json(['values' => $values]);
	}
}
