<?php
namespace App\Repository\Posts;
use App\Repository\BaseRepository;

class PostRepository extends BaseRepository {
	protected $model;

	public function __construct(Post $post) {
		return $this->model = $post;
	}
}

?>
