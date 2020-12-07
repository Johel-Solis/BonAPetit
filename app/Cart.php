<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    
    protected $fillable = [
        'date','totalCost'
    ];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function plateExecutives()
    {
        return $this->belongsToMany(PlateExecutive::class);

    }
    public function plateSpecials()
    {
        return $this->belongsToMany(PlateSpecials::class);

    }
    
}
