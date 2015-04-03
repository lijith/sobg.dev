<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingFormRequest extends FormRequest {

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
	    'billing-name'    => 'required|min:4|max:254',
	    'billing-address_1' => 'required|min:10',
	    'billing-address_2' => 'required|min:10',
	    'billing-country' => 'required|min:4',
	    'billing-state' => 'required|min:4',
	    'billing-city' => 'required|min:4',
	    'billing-contact_number_1' => 'required|min:10',
	    'billing-contact_number_1' => 'min:7',
	    'shipping-name'    => 'required|min:4|max:254',
	    'shipping-address_1' => 'required|min:10',
	    'shipping-address_2' => 'required|min:10',
	    'shipping-country' => 'required|min:4',
	    'shipping-state' => 'required|min:4',
	    'shipping-city' => 'required|min:4',
	    'shipping-contact_number_1' => 'required|min:10',
	    'shipping-contact_number_1' => 'min:7'

		];
	}

}
