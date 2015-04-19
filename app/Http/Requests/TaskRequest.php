<?php namespace CRM\Http\Requests;

use CRM\Http\Requests\Request;

use Carbon\Carbon;

class TaskRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public $rules = [
			'title'			=> 'required|min:3',
			'description'	=> 'required|min:3',
			'start_at'		=> 'required|after:yesterday',
            'time'          => 'required'
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
		if($projects = $this->projects){

			// Validate on updating
		}

		return $this->rules;
	}

	public function messages()
	{
		return [

			'start_at.required' => 'The starting date is required',
			'start_at.after' => 'The starting date is invalid.',
			
		];
	}

}
