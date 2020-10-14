<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soup extends Model
{
    protected $table = 'soups';
    
    protected $fillable = [
        'name'
    ];
    
    protected $guarded = ['id'];
    public $timestamps = false;
}
