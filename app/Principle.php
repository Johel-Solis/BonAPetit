<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principle extends Model
{
    protected $table = 'principles';
    
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
