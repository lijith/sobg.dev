<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YatraRegisterRequest extends FormRequest {

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
	    'first-name'    => 'required|min:4|max:254',
	    'last-name' => 'required',
	    'gender' => 'required',
	    'nationality' => 'required|min:3',
	    'blood-group' => 'required',
	    'passport-name' => 'required|min:3',
	    'passport-number' => 'required|min:5',
	    'address-line-1' => 'required|min:10',
	    'address-line-2' => 'required|min:10',
	    'city' => 'required|min:3',
	    'country' => 'required|min:3',
	    'state' => 'required|min:3',
	    'contact-mobile' => 'required|min:10',
	    'contact-landline' => 'required|min:10',
	    'email' => 'required|email',
	    'yatra-package' => 'required'

		];
	}

}
