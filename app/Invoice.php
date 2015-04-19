<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model {

    use SoftDeletes;

    protected  $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'invoices';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = ['client_id','date_due','comments','frequency','total','status'];

    /**
     * Get the dates in the input
     *
     * @return array
     */
    public function getDates()
    {
        return ['date_due'];
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOverdue($query)
    {
        return $query->where('date_due','<', Carbon::now()->format('Y-m-d H:i:s'))
            ->where('status', FALSE)
            ->orderBy('date_due', 'asc');
    }

    public function scopeToday($query)
    {
        return $query->where('date_due', '>=', Carbon::now())
            ->where('date_due', '<=', Carbon::now()->endOfDay())
            ->where('status', FALSE)
            ->orderBy('date_due', 'asc');
    }

    public function scopeTomorrow($query)
    {
        return $query->where('date_due', '>=', Carbon::parse('tomorrow')->startOfDay())
            ->where('date_due', '<=', Carbon::parse('tomorrow')->endOfDay())
            ->where('status', FALSE)
            ->orderBy('date_due', 'asc');
    }

    public function scopeThisWeek($query)
    {
        return $query->where('date_due', '>', Carbon::parse('tomorrow')->endOfDay())
            ->where('date_due', '<=', Carbon::now()->endOfWeek())
            ->where('status', FALSE)
            ->orderBy('date_due', 'asc');
    }

    public function scopeNextWeek($query)
    {
        return $query->where('date_due', '>=', Carbon::parse('next week')->startOfWeek())
            ->where('date_due', '<', Carbon::parse('next week')->endOfWeek())
            ->where('status', FALSE)
            ->orderBy('date_due', 'asc');
    }

    public function scopeThisMonth($query)
    {
        return $query->where('date_due', '>', Carbon::parse('next week')->endOfWeek())
            ->where('date_due', '<=', Carbon::now()->endOfMonth())
            ->where('status', FALSE)
            ->orderBy('date_due', 'asc');
    }

    public function scopeNextMonth($query)
    {
        return $query->where('date_due', '>=', Carbon::parse('next month')->startOfMonth())
            ->where('date_due', '<=', Carbon::parse('next month')->endOfMonth())
            ->where('status', FALSE)
            ->orderBy('date_due', 'asc');
    }

    public function scopeOther($query)
    {
        return $query->where('date_due', '>', Carbon::parse('next month')->endOfMonth())
            ->where('status', FALSE)
            ->orderBy('date_due', 'asc');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', TRUE);
    }

    public function scopePending($query)
    {
        return $query->where('status', FALSE);
    }

    /**
     * Set the due date to Carbon Instance
     * @param $date
     */
    public  function setDateDueAttribute($date)
    {
        $this->attributes['date_due'] = Carbon::parse($date);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
	{
		return $this->belongsTo('CRM\Client', 'client_id');
	}

    public function invoice_items()
    {
        return $this->hasMany('CRM\Invoice_Item', 'invoice_id');
    }

    public static function frequency($months)
    {
        $frequency = [0=>'Just Once', 1=>'Monthly', 3=>'After 3 Months', 6=>'After 6 Months', 12=>'Yearly'];

        return $frequency[$months];

    }

}
