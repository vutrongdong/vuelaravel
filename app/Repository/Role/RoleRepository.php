<?php
namespace App\Repository\Role;
use App\Repository\BaseRepository;

class RoleRepository extends BaseRepository {

	protected $model;

	public function __construct(Role $role) {
		return $this->model = $role;
	}
	public function Destroy($id) {
		return $this->model->whereId($id)->delete();
	}
}

?>
