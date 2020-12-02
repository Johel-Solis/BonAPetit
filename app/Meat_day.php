<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meat_day extends Model
{
    protected $table = 'meat_days';

    protected $fillable = [
        'meat_id','day_id',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;

    public function meats()
    {
        return $this->hasMany(Meat::class);

    }
    public function Days()
    {
        return $this->hasMany(Day::class);

    }
}
