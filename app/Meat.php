<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meat extends Model
{
    protected $table = 'meats';
    
    protected $fillable = [
        'name'
    ];
    
    protected $guarded = ['id'];
    public $timestamps = false;
}
