<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/admin', function () {
	return view('app');
});
Route::get('/login', function () {
	return view('authen.login');
});
Route::resource('/CustomCate', 'CateController');
Route::resource('/CustomProd', 'ProductController');
Route::resource('/Role', 'RoleController');
Route::resource('/User', 'UserController');
// Route::get('/{vue_capture?}', function () {
// 	return view('app');
// })->where('vue_capture', '[\/\w\.-]*');
?>
