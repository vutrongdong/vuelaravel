<?php
namespace App\Repository\Product;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository {
	protected $model;

	public function __construct(Product $prod) {
		return $this->model = $prod;
	}
}
?>
