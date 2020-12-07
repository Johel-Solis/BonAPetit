<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day_principle extends Model
{
     protected $table = 'day_principle';

    protected $fillable = [
        'principle_id','day_id',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;
/*
    public function principles()
    {
        return $this->hasMany(Principle::class);

    }
    public function day()
    {
        return $this->belongsTo(Day::class);

    }*/
}
