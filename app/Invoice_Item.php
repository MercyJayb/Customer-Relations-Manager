<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice_Item extends Model {

    use SoftDeletes;

    protected  $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoices_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['client_id','invoice_id','client_service_id','charge'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('CRM\Client', 'client_id');
    }

    public function invoice()
    {
        return $this->belongsTo('CRM\Invoice', 'invoice_id');
    }
}
