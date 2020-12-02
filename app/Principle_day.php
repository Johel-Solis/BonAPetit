<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principle_day extends Model
{
     protected $table = 'principle_days';

    protected $fillable = [
        'principle_id','day_id',
    ];

    protected $guarded = ['id'];
    public $timestamps = false;

    public function principles()
    {
        return $this->hasMany(Principle::class);

    }
    public function Days()
    {
        return $this->hasMany(Day::class);

    }
}
