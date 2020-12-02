<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Infrastructure\Repositories;

use App\Principle_day as EloquentDayPrincipleModel;
use Src\Menu\Weekly\Domain\Contracts\DayPrincipleRepositoryContract;
use Src\Menu\Principle\Domain\Principle;
use Src\Menu\weekly\Domain\DayPrinciple;
use Src\Menu\weekly\Domain\ValueObjects\DayId;


final class EloquentDayPrincipleRepository implements DayPrincipleRepositoryContract
{
   private $eloquentDayPrincipleModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentDayPrincipleModel= new EloquentDayPrincipleModel();
    }


    public function save(DayPrinciple $dayPrinciple): void
    {
        foreach($dayPrinciple->principles() as $principle) {
            $newDayP                = new EloquentDayPrincipleModel();
            $newDayP->day_id         =$dayPrinciple->day()->value();

            $newDayP->principle_id = $principle;
            $newDayP->save();
        }



    }

    public function update(DayId $dayId,DayPrinciple $dayPrinciple): void
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


      $dayPrinciple= $this->EloquentDayPrincipleModel->findOrFail($dayId->value());
      $dayPrinciple->delete();

    }




}
