<?php namespace CRM\Http\Requests;

use CRM\Http\Requests\Request;

class ClientRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public $rules = [
			'company'	=> 'required|min:3',
			'firstname'	=> 'required|min:3',
			'lastname'	=> 'required|min:3',
			'email'		=> 'required|email|unique:clients,email',
			'emails'		=> '',
			'phone'		=> 'required|min:6|phone|unique:clients,phone',
			'address'	=> 'required|min:3'
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
		if($this->method == 'PUT'){
			$this->rules['email'] .= ','.$this->clients->id;
			$this->rules['phone'] .= ','.$this->clients->id;
		}

		return $this->rules;
	}

	public function messages()
	{
		return ['phone' => 'The phone number is not valid. Please confirm and try again.'];
	}

}
