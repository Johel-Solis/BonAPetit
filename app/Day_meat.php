<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day_meat extends Model
{
    protected $table = 'day_meat';

    protected $fillable = [
        'meat_id','day_id',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;
/*
    public function meats()
    {
        return $this->hasMany(Meat::class);

    }
    public function day()
    {
        return $this->belongsTo(Day::class);

    }*/
}
