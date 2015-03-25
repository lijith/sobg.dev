<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AudioDiskFormUpdateRequest extends Request {

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
			'disk-title'				=> 'required|min:10',
			'disk-price'				=> 'required|min:2',
	    'excerpt' 					=> 'required|min:15',
	    'keywords' 					=> 'required|min:10',
	    'author' 						=> 'required|min:4',
	    'details' 					=> 'required|min:15',
	    'publish-date' 			=> 'required|date_format:m/d/Y',
	    'disk-cover-photo'	=> 'mimes:jpeg,jpg,png',
	    'sample-audio'			=> 'mimes:mp3'
		];
	}

}
