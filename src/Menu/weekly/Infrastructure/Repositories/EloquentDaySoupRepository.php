<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Infrastructure\Repositories;

use App\Soup_day as EloquentDaySoupModel;
use Src\Menu\Weekly\Domain\Contracts\DaySoupRepositoryContract;
use Src\Menu\Soup\Domain\Soup;
use Src\Menu\weekly\Domain\DaySoup;
use Src\Menu\weekly\Domain\ValueObjects\DayId;


final class EloquentDaySoupRepository implements DaySoupRepositoryContract
{
   private $eloquentDaySoupModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentDaySoupModel= new EloquentDaySoupModel();
    }


    public function save(DaySoup $daySoup): void
    {
        foreach($daySoup->soups() as $soup) {
            $newDayP                = new EloquentDaySoupModel();
            $newDayP->day_id       =$daySoup->day()->value();

            $newDayP->soup_id = $soup;
            $newDayP->save();
        }



    }

    public function update(DayId $dayId,DaySoup $daySoup): void
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


      $daySoup= $this->EloquentDaySoupModel->findOrFail($dayId->value());
      $daySoup->delete();

    }




}
