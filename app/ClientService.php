<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class ClientService extends Model {

	use SoftDeletes;

    protected  $table = 'client_services';

    protected $fillable = ['client_id', 'service_id', 'cost', 'frequency', 'start_date'];

    public function getDates()
    {
        return ['start_date'];
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('CRM\Client', 'client_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo('CRM\Service', 'service_id');
    }

    public static function frequency($days)
    {
        $frequency = [
            0  => 'Once',
            90  => 'After 3 months',
            180 => 'After 6 Months',
            270 => 'After 9 months',
            365 => 'Yearly'
        ];

        return $frequency[$days];
    }



}
