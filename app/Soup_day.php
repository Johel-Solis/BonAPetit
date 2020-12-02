<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soup_day extends Model
{
    protected $table = 'soup_days';

    protected $fillable = [
        'soup_id','day_id',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;

    public function soups()
    {
        return $this->hasMany(Soup::class);

    }
    public function Days()
    {
        return $this->hasMany(Day::class);

    }

}
