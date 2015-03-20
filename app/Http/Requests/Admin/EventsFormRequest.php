<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class EventsFormRequest extends Request {

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
			'event-title'				=> 'required|min:10',
	    'excerpt' 					=> 'required|min:15',
	    'keywords' 					=> 'required',
	    'details' 					=> 'required|min:15',
	    'event-start-date'	=> 'required|date_format:m/d/Y',
	    'event-end-date' 		=> 'required|date_format:m/d/Y',
	    'event-cover-photo' => 'required|mimes:jpeg,jpg,png',
	    'event-attachment' 	=> 'required|mimes:jpeg,jpg,png,pdf'
		];
	}

}
