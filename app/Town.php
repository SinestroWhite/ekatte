<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'type', 'municipality_id'
    ];

    /**
     *  Turning timestamps off
     */
    public $timestamps = false;
    public $incrementing = false;

    /**
     * Get municipality of the town.
     */
    public function municipality()
    {
        return $this->belongsTo('App\Municipality');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "ILIKE", "%$keyword%")
                    ->get();
            });
        }
    }
}
