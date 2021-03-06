<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cage_no', 'period_id', 'age', 'chicken_qty', 'action_date'];
    public function detail()
    {
        return $this->hasOne('App\ScheduleDetail');
    }

    public function period()
    {
        return $this->belongsTo('App\Period');
    }
}
