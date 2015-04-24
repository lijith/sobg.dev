<?php namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class ProfileAddressUpdateRequest extends FormRequest {
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
			'permanent-address-line-1'	=> 'required|min:6',
	    'permanent-address-line-2'	=> 'required|min:6',
	    'permanent-city'						=> 'required|min:3',
	    'permanent-state'						=> 'required|min:3',
	    'permanent-country'					=> 'required|min:3',
			'contact-address-line-1'		=> 'required|min:6',
	    'contact-address-line-2'		=> 'required|min:6',
	    'contact-city' 							=> 'required|min:3',
	    'contact-state' 						=> 'required|min:3',
	    'contact-country' 					=> 'required|min:3'
		];
	}
}