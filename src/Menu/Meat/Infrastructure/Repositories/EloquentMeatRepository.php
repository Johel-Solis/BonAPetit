<?php

declare(strict_types=1);

namespace Src\Menu\Meat\Infrastructure\Repositories;

use App\Meat as EloquentMeatModel;
use Src\Menu\Meat\Domain\Contracts\MeatRepositoryContract;
use Src\Menu\Meat\Domain\Meat;
use Src\Menu\Meat\Domain\ValueObjects\MeatId;


final class EloquentMeatRepository implements MeatRepositoryContract
{
   private $eloquentMeatModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentMeatModel= new EloquentMeatModel();
    }
    public function update(MeatId $meatId,Meat $meat): void
    {
        $meatToUpdate = new EloquentMeatModel();
        

        $data = [
            'name'          =>$meat->name()->value(),
            'photo'         =>$meat->photo()->value(),
        ];

        $meatToUpdate
            ->findOrFail($meatId->value())
            ->update($data);

    }


    public function save(Meat $meat): void
    {
        
        $newMeat                = new EloquentMeatModel();
        $newMeat->name          =$meat->name()->value();
        $newMeat->photo          =$meat->photo()->value();

        $newMeat->save();
    }


    public function list(){
        return $this->eloquentMeatModel::paginate(15);
    }
    public function find(MeatId $meatId)
    {
        $meat= $this->eloquentMeatModel->findOrFail($meatId->value());
         return $meat;
         
     }
 
    public function delete(MeatId $meatId){
        
       $meat= $this->eloquentMeatModel->findOrFail($meatId->value());
        $meat->delete();
        
        
    }


   
   
}
