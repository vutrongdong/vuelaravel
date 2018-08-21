<?php
namespace App\Repository;

interface RepositoryInterface {
	public function getAll();

	// public function getByQuery($params, $size);
	//
	public function getById($id);

	public function getByLimit($limit);

	public function takePaginate($paginate);

	public function getSort($value, $Sort);

	public function Create(array $data);

	public function Update($id, array $data);

	public function Destroy($id);
}
?>
