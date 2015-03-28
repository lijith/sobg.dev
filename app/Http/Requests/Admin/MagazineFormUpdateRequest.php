<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class MagazineFormRequest extends Request {

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
			'magazine-title'				=> 'required|min:10',
			'magazine-price'				=> 'required|min:2',
	    'excerpt' 					=> 'required|min:15',
	    'keywords' 					=> 'required|min:10',
	    'details' 					=> 'required|min:15',
	    'publish-date' 			=> 'required|date_format:m/d/Y',
	    'magazine-cover-photo'	=> 'mimes:jpeg,jpg,png',
	    'magazine-file'	=> 'mimes:pdf'
		];
	}

}
