<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('slug');
			$table->integer('price');
			$table->integer('cate_id');
			$table->string('description');
			$table->string('image');
			$table->string('promotion');
			$table->integer('quantity');
			$table->integer('status');
			$table->string('warranty');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('products');
	}
}
