<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    protected $table = 'beverages';
    
    protected $fillable = [
        'name','photo',
    ];
    
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function days()
    {
        return $this->belongsToMany(Day::class);

    }
}
