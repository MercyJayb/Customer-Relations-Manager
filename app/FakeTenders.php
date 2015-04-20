<?php namespace CRM;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FakeTenders extends Model {

    use SoftDeletes; // for when you want to soft delete a model

    protected $fillable = ['client','title','description','status','start_date'];

    /**
     * @return array
     */
    public function getDates(){
        return ['start_date'];
    }

    public function scopeOverdue($query)
    {
        return $query->where('start_date', '<', Carbon::now())
            ->where('status', FALSE)
            ->orderBy('start_date','desc');
    }

    public function scopePending($query)
    {
        return $query->where('status', FALSE)
            ->orderBy('start_date','desc');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', TRUE)
            ->orderBy('start_date','desc');
    }

    public function scopeDueInTwoWeeks($query)
    {
        return $query->where('start_date', '<', Carbon::now()->addWeeks(2)->endOfWeek())
            ->where('status', FALSE)
            ->orderBy('start_date','desc');
    }

    /**
     * @param $date
     */
    public function setStartDateAttribute($date)
    {
        $this->attributes['start_date'] = Carbon::parse($date);
    }

    /**
     * @return \Illuminate\Database\Eloquent

}
