<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Infrastructure\Repositories;

use App\beverage_day as EloquentDayBeverageModel;
use Src\Menu\Weekly\Domain\Contracts\DayBeverageRepositoryContract;
use Src\Menu\Beverage\Domain\Beverage;
use Src\Menu\weekly\Domain\DayBeverage;
use Src\Menu\weekly\Domain\ValueObjects\DayId;


final class EloquentDayBeverageRepository implements DayBeverageRepositoryContract
{
   private $eloquentDayBeverageModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentDayBeverageModel= new EloquentDayBeverageModel();
    }


    public function save(DayBeverage $dayBeverage): void
    {
        foreach($dayBeverage->beverages() as $beverage) {
            $newDayP                = new EloquentDayBeverageModel();
            $newDayP->day_id         =$dayBeverage->day()->value();

            $newDayP->beverage_id = $beverage;
            $newDayP->save();
        }



    }

    public function update(DayId $dayId,DayBeverage $dayBeverage): void
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


      $dayBeverage= $this->EloquentDayBeverageModel->findOrFail($dayId->value());
      $dayBeverage->delete();

    }




}
