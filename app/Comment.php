<?php namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {

	use SoftDeletes;

    public $fillable = ['content','user_id', 'task_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('CRM\User', 'user_id');
    }

    public function task()
    {
        return $this->belongsTo('CRM\Task', 'user_id');
    }

}
