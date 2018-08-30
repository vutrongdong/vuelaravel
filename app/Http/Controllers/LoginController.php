<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {

	public function Login(Request $request) {
		$arr = ['email' => $request->email, 'password' => $request->password];
		// dd($arr);
		// Auth::login('email' => $request->email);
		if (Auth::attempt($arr)) {
			return response()->json(['success' => 'success']);
			dd('login successess');
		} else {
			return response()->json('fail');
			dd('login fail');
		}
	}
	public function Logout() {
		Auth::logout();
	}
}
