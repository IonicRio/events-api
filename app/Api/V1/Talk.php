<?php
namespace App\Api\V1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talk extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'topics', 'objectives', 'requisites', 'speaker_id', 'event_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relations
     */

    public function recursive()
    {
        return ['speaker'];
    }

    public function speaker()
    {
        return $this->belongsTo('App\Api\V1\Speaker');
    }
}
