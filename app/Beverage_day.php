<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beverage_day extends Model
{
     protected $table = 'beverage_days';

    protected $fillable = [
        'beverage_id','day_id',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;

    public function beverages()
    {
        return $this->hasMany(Beverage::class);

    }
}
