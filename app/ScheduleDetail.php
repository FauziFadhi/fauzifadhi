<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['schedule_id', 'period_rule_id', 'status'];
    //

    public function schedule()
    {
        return $this->belongsTo('App\Schedule');
    }

    public function rule()
    {
        return $this->belongsTo('App\PeriodRule', 'period_rule_id');
    }
}
