<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'category_id', 'stock', 'unit'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function transactions()
    {
        return $this->hasMany('App\PeriodTransaction');
    }
}
