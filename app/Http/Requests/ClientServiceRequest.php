<?php namespace CRM\Http\Requests;

use CRM\Http\Requests\Request;

class ClientServiceRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */

    public $rules = [
        'service_id'    => 'required|numeric',
        'cost'          => 'required|numeric',
        'frequency'     => 'required|numeric'
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
        if($this->method == "PUT"){
            $this->rules['service_id'] = '';
        }

		return $this->rules;
	}

}
