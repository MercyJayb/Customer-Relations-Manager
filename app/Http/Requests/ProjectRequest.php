<?php namespace CRM\Http\Requests;

use CRM\Http\Requests\Request;

use Carbon\Carbon;

class ProjectRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public $rules = [

			'title'			=> 'required|min:3',
			'description'	=> 'required|min:3',
			//'client_id' 	=> 'required|numeric|',
			'start_at'		=> 'required|date_format:m/d/Y|after:yesterday',
			'end_at'		=> 'required|date_format:m/d/Y|after:start_at'
			
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
			'end_at.required' => 'The ending date is required',
			'start_at.after' => 'The starting date is invalid.',
			'end_at.after' => 'The ending date should be greater than the starting date.'
			
		];
	}

}
