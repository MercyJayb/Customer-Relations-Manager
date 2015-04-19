<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model {

    use SoftDeletes;

    protected  $dates = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */


	protected $fillable = ['company', 'firstname','lastname','email', 'emails', 'address', 'phone', 'password'];


	public function getFullnameAttribute()
	{
		return $this->firstname.' '.$this->lastname;
	}

    /**
     * Get the client's name and company name
     *
     * @return string
     */
    public function getFullnameAndCompanyAttribute()
    {
        return $this->company.' - '.$this->firstname.' '.$this->lastname;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project()
	{
		return $this->hasMany('CRM\Project');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function domain()
	{
		return $this->hasMany('CRM\Domain');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function client_service()
    {
        return $this->hasMany('CRM\ClientService', 'client_id');
    }

    public function tender()
    {
        return $this->hasMany('CRM\Tender', 'client_id');
    }


}
