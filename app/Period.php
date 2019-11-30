<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['start_date', 'end_date', 'total_chicken', 'tota_income'];

    public function transactions()
    {
        return $this->hasMany('App\PeriodTransaction');
    }
}
