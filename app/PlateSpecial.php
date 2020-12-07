<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PLateSpecial extends Model
{
    protected $table = 'plate_specials';
    
    protected $fillable = [
        'cost','cant','observation','plate_id'
    ];
    
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function carts()
    {
        return $this->belongsToMany(Cart::class);

    }
    public function plate()
    {
        return$this->hasOne(Plate::Class);
    }
}
