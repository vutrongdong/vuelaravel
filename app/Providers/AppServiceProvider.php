<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		View::share('category', \App::make(\App\Repository\Category\CategoryRepository::class)->getAll());
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
