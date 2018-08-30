<?php

namespace App\Policies;

use App\Post;
use App\Repository\Users\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy {
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 * @return void
	 */
	public function view(User $user, Post $post) {
		// dd($user->id, $post->user_id);
		return $user->id === $post->user_id;
	}
}
