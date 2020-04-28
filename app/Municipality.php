<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'province_id'
    ];

    /**
     *  Turning timestamps off
     */
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Get province of the municipality.
     */
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}
