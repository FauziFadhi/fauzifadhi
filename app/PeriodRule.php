<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodRule extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'period_id', 'product_id', 'age_start', 'age_end', 'qty'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function period()
    {
        return $this->belongsTo('App\Period');
    }
}
