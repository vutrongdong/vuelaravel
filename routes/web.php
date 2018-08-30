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
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'HomeController@index');
Route::post('/login', 'LoginController@Login');
Route::get('/logout', 'LoginController@Logout');
Route::get('/posts/{id}', 'PostController@show');

Route::resource('/CustomCate', 'CateController');
Route::resource('/CustomProd', 'ProductController');
Route::resource('/Role', 'RoleController');
Route::resource('/User', 'UserController');
Route::get('/{vue_capture?}', function () {
	return view('app');
})->where('vue_capture', '[\/\w\.-]*');
?>
