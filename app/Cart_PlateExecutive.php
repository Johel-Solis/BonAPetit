<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_PlateExecutive extends Model
{
    protected $table = 'cart__plate_executive';

    protected $fillable = [
        'cart_id','plate_executive_id',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;
}
