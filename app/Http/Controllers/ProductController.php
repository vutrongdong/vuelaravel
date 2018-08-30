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
		$data = $request->except('image');
		$exploded = explode(',', $request->image);
		$decoded = base64_decode($exploded[1]); //mã hóa kí tự
		if (str_contains($exploded[0], 'jpeg')) {
			$extension = 'jpg';
		} else {
			$extension = 'png';
		}
		$fileName = str_random(8) . '.' . $extension;
		$path = public_path() . '/upload/product/' . $fileName;
		file_put_contents($path, $decoded);
		$data['image'] = $fileName;
		$data['slug'] = str_slug($request->name);
		// $prod = Product::create($data);
		$prod = $this->prod->Create($data);
		return $prod;
	}

	public function edit($id) {
		$values = $this->prod->getById($id);
		return response()->json(['values' => $values]);
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
		if (count($exploded) > 1) {
			$decoded = base64_decode($exploded[1]); //mã hóa kí tự
			if (str_contains($exploded[0], 'jpeg')) {
				$extension = 'jpg';
			} else {
				$extension = 'png';
			}
			$fileName = str_random(8) . '.' . $extension;
			$path = public_path() . '/upload/product/' . $fileName;
			file_put_contents($path, $decoded);
			//tiến hành xóa ảnh cũ
			$path_old = $this->prod->getById($id);
			unlink('upload/product/' . $path_old->image);
		} else {
			$fileName = $request->image;
		}
		$data['image'] = $fileName;
		$data['slug'] = str_slug($request->name);
		$prod = $this->prod->Update($id, $request->except('image') + $data);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$deletes = $this->prod->Destroy($id);
		// return $deletes;
	}
}
