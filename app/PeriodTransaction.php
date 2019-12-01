<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodTransaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['period_id', 'product_id', 'qty', 'total_cost', 'input_date'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function period()
    {
        return $this->belongsTo('App\Period');
    }
}
