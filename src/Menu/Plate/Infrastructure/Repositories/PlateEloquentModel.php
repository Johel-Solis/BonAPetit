<?php

declare(strict_types = 1);

namespace src\Menu\Plate\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Model;

final class PlateEloquentModel extends Model
{
    protected $table = 'Plates';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['name', 'duration'];
}

?>