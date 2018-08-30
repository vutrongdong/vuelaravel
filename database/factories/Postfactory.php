<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
	return [
		'title' => $faker->sentence(),
		'body' => $faker->text(),
		'user_id' => 1,
	];
});
