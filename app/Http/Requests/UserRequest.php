<?php namespace CRM\Http\Requests;

use CRM\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */

	public $rules = [

			'username'	=> 'required|min:3|unique:users,username',
			'firstname'	=> 'required|min:3',
			'lastname'	=> 'required|min:3',
			'email'		=> 'required|email|unique:users,email',
			'phone'		=> 'required|min:6|phone|unique:users,phone',
			'password'	=> 'required|min:6',
			'cpassword'	=> 'required|same:password',
			'level_id'  => 'required|numeric',
			
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
		if($users = $this->users){

			$this->rules['username'] .= ','.$users ;
			$this->rules['email'] .= ','.$users ;
			$this->rules['phone'] .= ','.$users ;
		}

		return $this->rules;
	}

	public function messages()
	{
		return [
			'phone' 		=> 'The phone number is invalid. Please confirm and try again.',
			'email.unique'	=> 'The email is already in existence.',
			'phone.unique'	=> 'The phone is  already in existence.'

		];
	}

}
