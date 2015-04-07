<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AlbumFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'album-title'				=> 'required|min:10',
	    'keywords' 					=> 'required|min:10',
	    'description' 			=> 'required|min:15',
	    'album-cover-photo'	=> 'required|mimes:jpeg,jpg,png'
		];
	}

}
