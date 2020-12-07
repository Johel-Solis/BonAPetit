<?php

declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Infrastructure\Repositories;

use App\PlateSpecial as EloquentPlateSpecialModel;
use Src\Menu\PlateExecutive\Domain\Contracts\PlateSpecialRepositoryContract;
use Src\Menu\PlateExecutive\Domain\PlateSpecial;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveId;


final class EloquentPlateSpecialRepository implements PlateSpecialRepositoryContract
{
   private $eloquentPlateSpecialModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentPlateSpecialModel= new EloquentPlateSpecialModel();
    }


    public function save(PlateSpecial $PlateEspecial)
    {
        $newPlateEspecial                = new EloquentPlateSpecialModel();
        $newPlateEspecial->cost          =$PlateEspecial->cost()->value();
        $newPlateEspecial->cant          =1;
        $newPlateEspecial->observation          =$PlateEspecial->observation();
        $newPlateEspecial->plate_id          =$PlateEspecial->plate();
        
        $newPlateEspecial->save();
        return $newPlateEspecial;
    }

    public function update(PlateExecutiveId $PlateExecutiveId,PlateSpecial $PlateExecutive): void
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
