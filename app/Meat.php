<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meat extends Model
{
    protected $table = 'meats';
    
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
