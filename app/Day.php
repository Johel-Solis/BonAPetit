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

    public function beverages()
    {
        return $this->belongsToMany(Beverage::class);

    }
    public function soups()
    {
        return $this->belongsToMany(Soup::class);

    }
    public function meats()
    {
        return $this->belongsToMany(Meat::class);

    }
    public function principles()
    {
        return $this->belongsToMany(Principle::class);

    }
}
