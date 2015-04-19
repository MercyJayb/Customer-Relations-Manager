<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Input;

use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model {

    use SoftDeletes;

    protected  $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	//protected $dates = ['start_at'];

    public $time;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = ['user_id', 'title','description', 'start_at', 'status'];

	public function getDates()
    {
        return ['start_at'];
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOverdue($query)
    {
        return $query->where('start_at','<', Carbon::now()->format('Y-m-d H:i:s'))
            ->where('status', FALSE)
            ->orderBy('start_at', 'asc');
    }

    public function scopeToday($query)
    {
        return $query->where('start_at', '>=', Carbon::now())
            ->where('start_at', '<=', Carbon::now()->endOfDay())
            ->where('status', FALSE)
            ->orderBy('start_at', 'asc');
    }

    public function scopeTomorrow($query)
    {
        return $query->where('start_at', '>=', Carbon::parse('tomorrow')->startOfDay())
            ->where('start_at', '<=', Carbon::parse('tomorrow')->endOfDay())
            ->where('status', FALSE)
            ->orderBy('start_at', 'asc');
    }

    public function scopeThisWeek($query)
    {
        return $query->where('start_at', '>', Carbon::parse('tomorrow')->endOfDay())
            ->where('start_at', '<=', Carbon::now()->endOfWeek())
            ->where('status', FALSE)
            ->orderBy('start_at', 'asc');
    }

    public function scopeNextWeek($query)
    {
        return $query->where('start_at', '>=', Carbon::parse('next week')->startOfWeek())
            ->where('start_at', '<', Carbon::parse('next week')->endOfWeek())
            ->where('status', FALSE)
            ->orderBy('start_at', 'asc');
    }

    public function scopeThisMonth($query)
    {
        return $query->where('start_at', '>', Carbon::parse('next week')->endOfWeek())
            ->where('start_at', '<=', Carbon::now()->endOfMonth())
            ->where('status', FALSE)
            ->orderBy('start_at', 'asc');
    }

    public function scopeNextMonth($query)
    {
        return $query->where('start_at', '>=', Carbon::parse('next month')->startOfMonth())
            ->where('start_at', '<=', Carbon::parse('next month')->endOfMonth())
            ->where('status', FALSE)
            ->orderBy('start_at', 'asc');
    }

    public function scopeOther($query)
    {
        return $query->where('start_at', '>', Carbon::parse('next month')->endOfMonth())
            ->where('status', FALSE)
            ->orderBy('start_at', 'asc');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', TRUE);
    }


	public function user()
	{
		return $this->belongsTo('CRM\User');
	}

    public function getTimeAttribute()
    {
        return $this->start_at->format('H').":00";
    }

    public function comments()
    {
        return $this->hasMany('CRM\Comment', 'task_id');
    }

}
