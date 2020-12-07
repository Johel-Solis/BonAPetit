<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soup extends Model
{
    protected $table = 'soups';
    
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
