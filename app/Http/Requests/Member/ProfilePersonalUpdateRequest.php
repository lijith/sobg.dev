<?php namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePersonalUpdateRequest extends FormRequest {
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
			'name'							=> 'required|min:3',
	    'gender' 						=> 'required',
	    'dob'		 						=> 'required|date_format:m/d/Y',
	    'nationality' 			=> 'required|min:3',
	    'profession'				=> 'required|min:3',
	    'marital-status' 		=> 'required',
	    'contact-number-1'	=> 'required|min:10',
	    'contact-number-2' 	=> 'min:10'
		];
	}
}