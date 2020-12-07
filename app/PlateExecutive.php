<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PLateExecutive extends Model
{
   
    protected $table = 'plate_executives';
    
    protected $fillable = [
        'cost','cant','observation','soup_id','principle_id','meat_id','beverage_id'
    ];
    
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function carts()
    {
        return $this->belongsToMany(Cart::class);

    }
    public function soup()
    {
        return$this->hasOne(Soup::Class);
    }

    public function principle()
    {
        return$this->hasOne(Principle::Class);
    }
    public function meat()
    {
        return$this->hasOne(Meat::Class);
    }
    public function beverage()
    {
        return$this->hasOne(Beverage::Class);
    }
}
