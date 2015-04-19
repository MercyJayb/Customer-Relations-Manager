<?php namespace CRM\Http\Requests;

use CRM\Http\Requests\Request;

class TenderRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */

    public $rules = [
        'title'         =>  'required|min:3',
        'description'   =>  'required|min:5',
        'start_date'    =>  'required|date|after:yesterday'
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
        if($this->method == 'POST'){

        }
		return $this->rules;
	}

}
