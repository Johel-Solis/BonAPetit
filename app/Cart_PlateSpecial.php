<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_PlateSpecial extends Model
{
    protected $table = 'cart__plate_special';

    protected $fillable = [
        'cart_id','plate_special_id',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;
}
