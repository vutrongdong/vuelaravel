<?php
namespace App\Repository\Category;

use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository {

	protected $model;

	public function __construct(Category $category) {
		$this->model = $category;
	}
}

?>
