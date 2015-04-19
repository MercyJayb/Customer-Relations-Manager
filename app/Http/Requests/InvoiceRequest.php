<?php namespace CRM\Http\Requests;

use CRM\Http\Requests\Request;

class InvoiceRequest extends Request {

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
		//	'client_id'         => 'required|numeric',
//            'discount'          => 'min:1',
//            'due_date'          => 'required|date_format:m/d/Y|after:yesterday',
//            'terms'             => 'min:5',
//            'public_notes'      => 'min:5',
//            'is_recurring'      => 'required|numeric',
//            'frequency_id'      => 'sometimes|required',
//            'amount'            => 'required'
		];
	}

    public function messages()
    {
        return [
            'client_id.required'=>'Please select the client.',
            'due_date.required'         => 'Please enter the due date.',
            'is_recurring.required'     => 'Please specify if the invoice is recurring or not.',
            'frequency_id.required'     => 'Please specify the frequency for the invoice'

        ];
    }

}
