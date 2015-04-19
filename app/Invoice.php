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
		return $this->belongsTo('CRM\Client');
	}

    public function invoice_items()
    {
        return $this->hasMany('CRM\Invoice_Item');
    }

}
