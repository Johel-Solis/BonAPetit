<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Infrastructure\Repositories;

use App\Plate as EloquentPlateModel;
use Src\Menu\Plate\Domain\Contracts\PlateRepositoryContract;
use Src\Menu\Plate\Domain\Plate;
use Src\Menu\Plate\Domain\ValueObjects\PlateId;


final class EloquentPlateRepository implements PlateRepositoryContract
{
   private $eloquentPlateModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentPlateModel= new EloquentPlateModel();
    }


    public function save(Plate $plate): void
    {
        
        $newPlate                = new EloquentPlateModel();
        $newPlate->name          =$plate->name()->value();
        $newPlate->description   =$plate->description()->value();
        $newPlate->precio        =$plate->precio()->value();
        $newPlate->photo         =$plate->photo()->value();

        $newPlate->save();
    }


    public function update(PlateId $plateId,Plate $plate): void
    {
        $plateToUpdate = new EloquentPlateModel();
        

        $data = [
            'name'          =>$plate->name()->value(),
            'description'   =>$plate->description()->value(),
            'precio'        =>$plate->precio()->value(),
            'photo'         =>$plate->photo()->value(),
        ];

        $plateToUpdate
            ->findOrFail($plateId->value())
            ->update($data);

    }
    public function list(){
        return $this->eloquentPlateModel::paginate(15);
    }
    public function find(PlateId $plateId)
    {
        $plate= $this->eloquentPlateModel->findOrFail($plateId->value());
         return $plate;
         
     }
 
    public function delete(PlateId $plateId){
        
       $plate= $this->eloquentPlateModel->findOrFail($plateId->value());
        $photo= $plate->photo;
        $plate->delete();
        return $photo;
        
    }


   
   
}
