<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Infrastructure\Repositories;

use App\Day as EloquentDayModel;
use Src\Menu\Weekly\Domain\Contracts\DayRepositoryContract;
use Src\Menu\weekly\Domain\Day;
use Src\Menu\weekly\Domain\ValueObjects\DayId;


final class EloquentDayRepository implements DayRepositoryContract
{
   private $eloquentDayModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentDayModel= new EloquentDayModel();
    }


    public function save(Day $day): Day
    {
    
            $newDayP                = new EloquentDayModel();
            $newDayP->day_week         =$day->day_week()->value();
             $newDayP->save();
             
             $day->setId(new DayId($newDayP->id));
             return $day;


    }

    public function update(DayId $dayId,Day $day): void
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
        
        return $this->eloquentDayModel::paginate(15);
        
    }

    public function find(int $dayId)
    {
        $newDayP  = new EloquentDayModel();

        $day= $newDayP->findOrFail($dayId);
         return $day;

     }
     public function meats(int $dayId)
    {
        
        $day= $this->eloquentDayModel->findOrFail($dayId);
         return $day->meats();

     }
     public function principles(int $dayId)
    {
        
        $day= $this->eloquentDayModel->findOrFail($dayId);
        return $day->principles();

     }
     public function beverages(int $dayId)
    {
        
        $day= $this->eloquentDayModel->findOrFail($dayId);
        return $day->beverages();

     }
     public function soups(int $dayId)
    {
        
        $day= $this->eloquentDayModel->findOrFail($dayId);
        return $day->soups();

     }

     public function delete(DayId $dayId){
        $newDayP                = new EloquentDayModel();

      $day= $newDayP->findOrFail($dayId->value());
     
      

      $day->delete();

    }




}
