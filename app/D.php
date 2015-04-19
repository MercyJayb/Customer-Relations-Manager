<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class D extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'domains_backup';

	// public function getDates()
	// {
	//     return ['start_date'];
	// }

	//protected $dates = ['start_date'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = [
			'user_id',
			'client_id',
			'domain',
			'ip',
			'username',
			'email',
			'start_date',
			'disk_partition',
			'quota',
			'disk_space_used',
			'package',
			'theme',
			'owner',
			'server',
			'unix_start_date',
			'disk_space_used_bytes',
			'quota_bytes'
	];

	

}
