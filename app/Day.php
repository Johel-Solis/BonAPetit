<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = 'days';
    
    protected $fillable = [
        'day_week',
    ];
    
    protected $guarded = ['id'];
    public $timestamps = false;

    public function beverage_days()
    {
        return $this->belongToMany(Beverage_day::class);

    }
    public function soup_days()
    {
        return $this->belongToMany(Soup_day::class);

    }
    public function meat_days()
    {
        return $this->belongToMany(Meat_day::class);

    }
    public function Principle_day()
    {
        return $this->belongToMany(Principle_day::class);

    }
}
