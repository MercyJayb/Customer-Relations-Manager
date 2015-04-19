<?php namespace CRM\Http\Requests;

use CRM\Http\Requests\Request;

use Carbon\Carbon;

class DomainRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */


	// abcchildrensaidkenya.or.ke,
	// 199.188.200.187,
	// abcchildrensaidk,
	// info@abcchildrensaidkenya.or.ke,
	// 15 Mar 24 02:26,
	// home,
	// 1000,
	// ,
	// bluecosp_Blue Basic,
	// x3,
	// bluecosp,
	// host14.registrar-servers.com,
	// 1427178389,
	// 204,
	// 1024000

	// Domain,
	// IP,
	// User Name,
	// Email,
	// Start Date,
	// Disk Partition,
	// Quota,
	// Disk Space Used,
	// Package,
	// Theme,
	// Owner,
	// Server,
	// Unix Startdate,
	// Disk Space Used (bytes),
	// Quota (bytes)




	public $rules = [

			//'client_id' 	=> 'required|numeric',
			'domain' 		=> 'required',
			'ip' 			=> 'required|ip',
			'username' 		=> 'required',
			'email' 		=> 'required|email',
			'start_date' 	=> 'required|date',
			'disk_partition'=> 'required',
			'quota' 		=> 'required',
			'disk_space_used' => '',
			'package' 			=> 'required',
			'theme' 			=> 'required',
			'owner' 			=> 'required',
			'server' 			=> 'required',
			'unix_start_date' 	=> 'required|numeric',
			'disk_space_used_bytes' 	=> '',
			'quota_bytes'  	=> 'required'
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

			// 'start_at.required' => 'The starting date is required',
			// 'end_at.required' => 'The ending date is required',
			// 'start_at.after' => 'The starting date is invalid.',
			// 'end_at.after' => 'The ending date should be greater than the starting date.'
			
		];
	}

}
