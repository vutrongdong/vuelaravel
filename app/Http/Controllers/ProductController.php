<?php

namespace App\Http\Controllers;

use App\Repository\Category\Category;
use App\Repository\Product\Product;
use App\Repository\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	protected $prod;

	public function __construct(ProductRepository $product) {
		return $this->prod = $product;
	}
	public function index() {
		$category = Category::all();
		$values = $this->prod->getAll();
		return response()->json(['values' => $values, 'category' => $category]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$exploded = explode(',', $request->image);
		$decoded = base64_decode($exploded[1]); //mã hóa kí tự
		if (str_contains($exploded[0], 'jpeg')) {
			$extension = 'jpg';
		} else {
			$extension = 'png';
		}
		$fileName = str_random(8) . '.' . $extension;
		$path = public_path() . '/upload/' . $fileName;
		file_put_contents($path, $decoded);
		$data['image'] = $fileName;
		$data['slug'] = str_slug($request->name);
		$prod = Product::create($data);
		return $prod;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$exploded = explode(',', $request->image);
		$decoded = base64_decode($exploded[1]); //mã hóa kí tự
		if (str_contains($exploded[0], 'jpeg')) {
			$extension = 'jpg';
		} else {
			$extension = 'png';
		}
		$fileName = str_random(8) . '.' . $extension;
		$path = public_path() . '/upload/' . $fileName;
		file_put_contents($path, $decoded);
		$data['image'] = $fileName;
		$data['slug'] = str_slug($request->name);
		$prod = $this->prod->Update($id, $prod);

		return response()->json(['prod_id' => $prod]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product) {
		//
	}
}
