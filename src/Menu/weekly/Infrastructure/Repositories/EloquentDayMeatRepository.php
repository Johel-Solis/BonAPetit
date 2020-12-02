<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Infrastructure\Repositories;

use App\Meat_day as EloquentDayMeatModel;
use Src\Menu\Weekly\Domain\Contracts\DayMeatRepositoryContract;
use Src\Menu\Meat\Domain\Meat;
use Src\Menu\weekly\Domain\DayMeat;
use Src\Menu\weekly\Domain\ValueObjects\DayId;


final class EloquentDayMeatRepository implements DayMeatRepositoryContract
{
   private $eloquentDayMeatModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentDayMeatModel= new EloquentDayMeatModel();
    }


    public function save(DayMeat $dayMeat): void
    {
        foreach($dayMeat->meats() as $meat) {
            $newDayP                = new EloquentDayMeatModel();
            $newDayP->day_id        =$dayMeat->day()->value();
            $newDayP->meat_id = $meat;
            $newDayP->save();
        }



    }

    public function update(DayId $dayId,DayMeat $dayMeat): void
    {
        /*
        $soupToUpdate = new EloquentSoupModel();


        $data = [
            'name'          =>$soup->name()->value(),
            'photo'         =>$soup->photo()->value(),
        ];

        $soupToUpdate
            ->findOrFail($soupId->value())
            ->update($data);
            */
    }

    public function list()
    {
        /*
        return $this->eloquentSoupModel::paginate(15);
        */
    }

    public function find(DayId $dayId)
    {
        /*
        $soup= $this->eloquentSoupModel->findOrFail($soupId->value());
         return $soup;*/

     }

     public function delete(DayId $dayId){


      $dayMeat= $this->EloquentDayMeatModel->findOrFail($dayId->value());
      $dayMeat->delete();

    }




}
