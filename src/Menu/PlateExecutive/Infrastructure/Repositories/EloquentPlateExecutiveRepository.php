<?php

declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Infrastructure\Repositories;

use App\PlateExecutive as EloquentPlateExecutiveModel;
use Src\Menu\PlateExecutive\Domain\Contracts\PlateExecutiveRepositoryContract;
use Src\Menu\PlateExecutive\Domain\PlateExecutive;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveId;


final class EloquentPlateExecutiveRepository implements PlateExecutiveRepositoryContract
{
   private $eloquentPlateExecutiveModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentPlateExecutiveModel= new EloquentPlateExecutiveModel();
    }


    public function save(PlateExecutive $PlateExecutive)
    {
        $newPlateExecutive                = new EloquentPlateExecutiveModel();
        $newPlateExecutive->cost          =$PlateExecutive->cost()->value();
        $newPlateExecutive->cant          =2;
        $newPlateExecutive->observation          =$PlateExecutive->observation();
        $newPlateExecutive->soup_id          =$PlateExecutive->soup();
        $newPlateExecutive->principle_id          =$PlateExecutive->principle();
        $newPlateExecutive->meat_id         =$PlateExecutive->meat();
        $newPlateExecutive->beverage_id          =$PlateExecutive->beverage();
      
        $newPlateExecutive->save();
        return $newPlateExecutive;
    }

    public function update(PlateExecutiveId $PlateExecutiveId,PlateExecutive $PlateExecutive): void
    {
       /* $PlateExecutiveToUpdate = new EloquentPlateExecutiveModel();


        $data = [
            'name'          =>$PlateExecutive->name()->value(),
            'photo'         =>$PlateExecutive->photo()->value(),
        ];

        $PlateExecutiveToUpdate
            ->findOrFail($PlateExecutiveId->value())
            ->update($data);
*/
    }



    public function list(){
  /*      return $this->eloquentPlateExecutiveModel::paginate(15);*/
    }
    public function find(PlateExecutiveId $PlateExecutiveId)
    {/*
        $PlateExecutive= $this->eloquentPlateExecutiveModel->findOrFail($PlateExecutiveId->value());
         return $PlateExecutive;
*/
     }

    public function delete(PlateExecutiveId $PlateExecutiveId){
/*
       $PlateExecutive= $this->eloquentPlateExecutiveModel->findOrFail($PlateExecutiveId->value());
        $PlateExecutive->delete();*/
    }




}
