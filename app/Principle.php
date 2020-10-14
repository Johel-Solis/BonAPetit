<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principle extends Model
{
    protected $table = 'principles';
    
    protected $fillable = [
        'name'
    ];
    
    protected $guarded = ['id'];
    public $timestamps = false;
}
