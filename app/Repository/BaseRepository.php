<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface {
	protected $model;

	public function getAll() {
		return $this->model->all();
	}

	public function getByLimit($limit) {
		return $this->model->limit($limit)->get();
	}

	public function takePaginate($pagi) {
		return $this->model->paginate($pagi);
	}

	public function getSort($value, $Sort) {
		return $this->model->orderBy($value, $Sort)->get();
	}

	public function getById($id) {
		return $this->model->find($id);
	}

	public function Create(array $data) {
		return $this->model->create($data);
	}

	public function update($id, array $attributes) {
		return $this->model->find($id)->update($attributes);
	}
	public function Destroy($id) {
		return $this->model->find($id)->delete();
	}
}

?>
