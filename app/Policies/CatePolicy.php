<?php

namespace App\Policies;
use Illuminate\Auth\Access\HandlesAuthorization;

class CatePolicy {
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}
	public function view(User $user, Category $cate) {
		dd($user->id === $cate->user_id);
		return $user->id === $cate->user_id;
	}
}
