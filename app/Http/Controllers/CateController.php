<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateAddRequest;
use App\Http\Requests\UpdateCateRequest;
use App\Repository\Category\Category;
use App\Repository\Category\CategoryRepository;
use Illuminate\Http\Request;

class CateController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	protected $cate;

	public function __construct(CategoryRepository $cate) {
		$this->cate = $cate;
	}

	public function index() {
		$values = $this->cate->getAll();

		return response()->json(['values' => $values]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CateAddRequest $request) {
		$data = $request->all();
		$data['slug'] = str_slug($request->name);
		$addcate = $this->cate->Create($data);
		return response()->json(['values' => $addcate, 'message' => 'create success']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Cate  $cate
	 * @return \Illuminate\Http\Response
	 */
	public function show($cate) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Cate  $cate
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$values = $this->cate->getById($id);
		return response()->json(['values' => $values]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Cate  $cate
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateCateRequest $request, $id) {
		$category = Category::find($id);
		$data = $request->all();
		$data['slug'] = str_slug($request->name);
		$category->update($data);
		return response()->json(["edits" => $category, 'message' => 'edit seccess']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Cate  $cate
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$deletes = $this->cate->Destroy($id);
		return response()->json(['deletes' => $deletes, 'message' => 'delete succes']);
	}
}
