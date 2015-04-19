<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {

    use SoftDeletes;

    protected  $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = ['user_id', 'client_id','title','description', 'start_at', 'end_at', 'status'];

	public function getDates()
    {
        return ['start_at', 'end_at'];
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', TRUE)
            ->orderBy('start_at', 'desc');
    }

    public function scopeOverdue($query)
    {
        return $query->where('status', FALSE)
            ->where('start_at','<', Carbon::now())
            ->orderBy('start_at', 'desc');
    }

    public function scopePending($query)
    {
        return $query->where('status', FALSE)
            ->orderBy('start_at', 'desc');
    }

	public function setStartAtAttribute($date)
	{
		$this->attributes['start_at'] = Carbon::parse($date);
	}

    public function setEndAtAttribute($date)
    {
        $this->attributes['end_at'] = Carbon::parse($date);
    }

	public function user()
	{
		return $this->belongsTo('CRM\User');
	}

	public function client()
    {
        return $this->belongsTo('CRM\Client');
    }


}
