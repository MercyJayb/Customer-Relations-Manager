<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model {

    use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'domains';

    protected $dates = ['deleted_at'];

	public function getDates()
	{
	    return ['start_date'];
	}

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

    public function scopeOlderThanOneYear($query)
    {
        return $query->where('start_date', '<=', Carbon::now()->subYear());
    }

    public function scopeUnpaid($query)
    {
        return $query->where('paid', FALSE);
    }

    public function scopePaid($query)
    {
        return $query->where('paid', TRUE);
    }

    public function scopeRevenueCollected($query, $month)
    {
        return $query->where('paid', TRUE)
            ->whereBetween('start_date', [
                Carbon::createFromFormat('m', $month)->startOfMonth(), Carbon::createFromFormat('m', $month)->endOfMonth()
            ]);
    }

    public  function scopeExpiresThisMonth($query)
    {
        return $query->whereRaw('MONTH(start_date) = ?', [Carbon::now()->month]);
    }

    public  function scopeExpiresThisYear($query)
    {
        return $query->whereRaw('YEAR(start_date) = ?', [Carbon::now()->year]);
    }

    public function scopeActive($query)
    {
        return $query->paid()->where('start_date', '<', Carbon::now()->subYear());
    }

    public function scopeExpired($query)
    {
        return $query->where('paid', FALSE)->where('start_date', '>', Carbon::now()->subYear());
    }

    public function scopeDeleted($query)
    {
        return $query->onlyTrashed();
    }

	public function setStartDateAttribute($date)
	{
		
		$this->attributes['start_date'] = Carbon::parse($date);
	}

	public function getStartAttribute()
	{
		return $this->start_at->format('m/d/Y');
	}

	public function setUserIdAttribute()
	{
		$this->attributes['user_id'] = 1;
	}

	public function user()
	{
		return $this->belongsTo('CRM\User');
	}

	public function scopeExpiringThisMonth($query)
	{
		$query->where('start_date', '<=', Carbon::createFromDate('2015-04-01 00:00:00'));
	}

	public function client()
	{
		return $this->belongsTo('CRM\Client');
	}

}
