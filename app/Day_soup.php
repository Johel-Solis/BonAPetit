<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day_soup extends Model
{
    protected $table = 'day_soup';

    protected $fillable = [
        'soup_id','day_id',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;
/*
    public function soups()
    {
        return $this->hasMany(Soup::class);

    }
    public function day()
    {
        return $this->belongsTo(Day::class);

    }*/

}
