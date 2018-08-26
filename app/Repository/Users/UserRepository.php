<?php
namespace App\Repository\Users;
use App\Repository\BaseRepository;

class UserRepository extends BaseRepository {
	protected $model;

	public function __construct(User $user) {
		return $this->model = $user;
	}
}

?>
