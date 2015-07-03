<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ArticlesFormRequest extends Request {

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
			'article-title' => 'required|min:10',
			'excerpt' => 'required|min:15',
			'keywords' => 'required',
			'details' => 'required|min:15',
			'publish-date' => 'required|date_format:m/d/Y',
		];
	}

}
