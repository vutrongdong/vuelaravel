<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateAddRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'required|unique:categories,name|min:3|max:32',
		];
	}
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function messages() {
		return
			[
			'name.required' => 'phải nhập tên vào',
			'name.unique' => 'tên không được trùng',
			'name.min' => 'tên phải có độ dài từ 3 đến 32 kí tự',
			'name.max' => 'tên phải có độ dài từ 3 đến 32 kí tự',
		];
	}
}
