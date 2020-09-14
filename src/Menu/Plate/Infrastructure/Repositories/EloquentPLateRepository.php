<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Infrastructure\Repositories;

use App\Plate as EloquentPlateModel;
use Src\Menu\Plate\Domain\Contracts\PlateRepositoryContract;
use Src\Menu\Plate\Domain\Plate;

final class EloquentPlateRepository implements PlateRepositoryContract
{
   
 /**
    *  __Construct method
    */
    public function __construct()
    {
    }


    public function save(Plate $plate): void
    {
        
        $newPlate                = new EloquentPlateModel();
        $newPlate->name          =$plate->name()->value();
        $newPlate->description   =$plate->description()->value();
        $newPlate->precio        =$plate->precio()->value();

        $newPlate->save();
    }

   
   
}
