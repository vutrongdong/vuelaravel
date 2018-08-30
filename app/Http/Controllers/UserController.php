<?php

namespace App\Http\Controllers;

use App\Repository\Users\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	protected $user;

	public function __construct(UserRepository $user) {
		return $this->user = $user;
	}
	public function index() {
		$users = $this->user->getAll();
		return response()->json(['users' => $users]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// $data = $request->except('image', 'password');
		// $exploded = explode(',', $request->image);

		// $decoded = base64_decode($exploded[1]); //mã hóa kí tự
		// if (str_contains($exploded[0], 'jpeg')) {
		// 	$extension = 'jpg';
		// } else {
		// 	$extension = 'png';
		// }
		// $fileName = str_random(8) . '.' . $extension;
		// $path = public_path() . '/upload/user/' . $fileName;
		// file_put_contents($path, $decoded);
		// $data['image'] = $fileName;
		$data = $request->except('password'); //
		$data['password'] = bcrypt($request->passwpord);
		$user = $this->user->Create($data);
		// dd('them thanh cong');
		// return $user;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$values = $this->user->getById($id);
		return response()->json(['values' => $values]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$data = $request->except('image', 'password');
		$exploded = explode(',', $request->image);
		if (count($exploded) > 1) {
			$decoded = base64_decode($exploded[1]); //mã hóa kí tự
			if (str_contains($exploded[0], 'jpeg')) {
				$extension = 'jpg';
			} else {
				$extension = 'png';
			}
			$fileName = str_random(8) . '.' . $extension;
			$path = public_path() . '/upload/user/' . $fileName;
			file_put_contents($path, $decoded);
			//tiến hành xóa ảnh cũ
			$path_old = $this->user->getById($id);
			unlink('upload/user/' . $path_old->image);
		} else {
			$fileName = $request->image;
		}
		$data['image'] = $fileName;
		$data['password'] = bcrypt($request->password);
		$user = $this->user->Update($id, $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$delete = $this->user->Destroy($id);
	}

}
