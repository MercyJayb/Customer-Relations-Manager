<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice_Records extends Model {

    use SoftDeletes;

    protected  $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoice_records';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'invoice_id',
        'client_service_id',
        'client_id',
        'total',
        'discount',
        'discount_details',
        'tax',
        'tax_details',
        'due_date',
        'status'
    ];

    /**
     * Get the dates in the input
     *
     * @return array
     */
    public function getDates()
    {
        return ['due_date'];
    }



    /**
     * @param $query
     * @return mixed
     */
    public function scopeOverdue($query)
    {
        return $query->where('due_date','<', Carbon::now()->format('Y-m-d H:i:s'))
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }

    public function scopeToday($query)
    {
        return $query->where('due_date', '>=', Carbon::now())
            ->where('due_date', '<=', Carbon::now()->endOfDay())
            ->groupBy('invoice_id')
            ->where('status', FALSE)
            ->orderBy('due_date', 'asc');
    }

    public function scopeTomorrow($query)
    {
        return $query->where('due_date', '>=', Carbon::parse('tomorrow')->startOfDay())
            ->where('due_date', '<=', Carbon::parse('tomorrow')->endOfDay())
            ->groupBy('invoice_id')
            ->where('status', FALSE)
            ->orderBy('due_date', 'asc');
    }

    public function scopeThisWeek($query)
    {
        return $query->where('due_date', '>', Carbon::parse('tomorrow')->endOfDay())
            ->where('due_date', '<=', Carbon::now()->endOfWeek())
            ->groupBy('invoice_id')
            ->where('status', FALSE)
            ->orderBy('due_date', 'asc');
    }

    public function scopeNextWeek($query)
    {
        return $query->where('due_date', '>=', Carbon::parse('next week')->startOfWeek())
            ->where('due_date', '<', Carbon::parse('next week')->endOfWeek())
            ->groupBy('invoice_id')
            ->where('status', FALSE)
            ->orderBy('due_date', 'asc');
    }

    public function scopeThisMonth($query)
    {
        return $query->where('due_date', '>', Carbon::parse('next week')->endOfWeek())
            ->where('due_date', '<=', Carbon::now()->endOfMonth())
            ->groupBy('invoice_id')
            ->where('status', FALSE)
            ->orderBy('due_date', 'asc');
    }

    public function scopeNextMonth($query)
    {
        return $query->where('due_date', '>=', Carbon::parse('next month')->startOfMonth())
            ->where('due_date', '<=', Carbon::parse('next month')->endOfMonth())
            ->groupBy('invoice_id')
            ->where('status', FALSE)
            ->orderBy('due_date', 'asc');
    }

    public function scopeNextTwoMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(2)->startOfMonth(), Carbon::now()->addMonths(2)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }
    public function scopeNextThreeMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(3)->startOfMonth(), Carbon::now()->addMonths(3)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }
    public function scopeNextFourMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(4)->startOfMonth(), Carbon::now()->addMonths(4)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }
    public function scopeNextFiveMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(5)->startOfMonth(), Carbon::now()->addMonths(5)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }
    public function scopeNextSixMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(6)->startOfMonth(), Carbon::now()->addMonths(6)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }
    public function scopeNextSevenMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(7)->startOfMonth(), Carbon::now()->addMonths(7)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }
    public function scopeNextEightMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(8)->startOfMonth(), Carbon::now()->addMonths(8)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }
    public function scopeNextNineMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(9)->startOfMonth(), Carbon::now()->addMonths(9)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }
    public function scopeNextTenMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(10)->startOfMonth(), Carbon::now()->addMonths(10)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }

    public function scopeNextElevenMonths($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->addMonths(11)->startOfMonth(), Carbon::now()->addMonths(11)->endOfMonth()])
            ->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date', 'asc');
    }


    public function scopeSettled($query)
    {
        return $query->where('status', TRUE)
            ->groupBy('invoice_id')
            ->orderBy('due_date');
    }

    public function scopePending($query)
    {
        return $query->where('status', FALSE)
            ->groupBy('invoice_id')
            ->orderBy('due_date');
    }

    public function scopeExpectedThisMonth($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth() ])
            ->where('status', FALSE);
    }

    public function scopeExpectedThisYear($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->startOfYear(), Carbon::now()->endOfYear() ])
            ->where('status', FALSE);
    }

    public function scopeCollectedThisMonth($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth() ])
            ->where('status', TRUE);
    }

    public function scopeCollectedThisYear($query)
    {
        return $query->whereBetween('due_date', [ Carbon::now()->startOfYear(), Carbon::now()->endOfYear() ])
            ->where('status', TRUE);
    }

    public static function nextInvoiceID()
    {
        $id = Invoice_Records::where('id', '>', 1)->orderBy('id', 'DESC')->first();

        return $id->invoice_id + 1;
    }

    /**
     * Set the due date to Carbon Instance
     * @param $date
     */
    public  function setDueDateAttribute($date)
    {
        $this->attributes['due_date'] = Carbon::parse($date);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('CRM\Client', 'client_id');
    }

    public function client_service()
    {
        return $this->belongsTo('CRM\ClientService', 'client_service_id');
    }

}
