<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $table = 'plates';
    
    protected $fillable = [
        'name', 'description', 'precio',
    ];
    
    protected $guarded = ['id'];
    public $timestamps = false;
}
