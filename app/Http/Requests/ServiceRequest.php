<?php namespace CRM\Http\Requests;

use CRM\Http\Requests\Request;

use Carbon\Carbon;

class ServiceRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public $rules = [

			'name'		=> 'required|min:3',
			'cost'		=> 'numeric'
		];

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
		if($services = $this->services){

			// Validate on updating
		}

		return $this->rules;
	}

	public function messages()
	{
		return [
			
		];
	}

}
