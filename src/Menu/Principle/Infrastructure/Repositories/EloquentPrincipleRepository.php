<?php

declare(strict_types=1);

namespace Src\Menu\Principle\Infrastructure\Repositories;

use App\Principle as EloquentPrincipleModel;
use Src\Menu\Principle\Domain\Contracts\PrincipleRepositoryContract;
use Src\Menu\Principle\Domain\Principle;
use Src\Menu\Principle\Domain\ValueObjects\PrincipleId;


final class EloquentPrincipleRepository implements PrincipleRepositoryContract
{
   private $eloquentPrincipleModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentPrincipleModel= new EloquentPrincipleModel();
    }


    public function save(Principle $principle): void
    {
        
        $newPrinciple                = new EloquentPrincipleModel();
        $newPrinciple->name          =$principle->name()->value();
        $newPrinciple->photo          =$principle->photo()->value();
        $newPrinciple->save();
    }
    public function update(PrincipleId $principleId,Principle $principle): void
    {
        $principleToUpdate = new EloquentPrincipleModel();
        

        $data = [
            'name'          =>$principle->name()->value(),
            'photo'         =>$principle->photo()->value(),
        ];

        $principleToUpdate
            ->findOrFail($principleId->value())
            ->update($data);

    }


    
    public function list(){
        return $this->eloquentPrincipleModel::paginate(15);
    }
    public function find(PrincipleId $principleId)
    {
        $principle= $this->eloquentPrincipleModel->findOrFail($principleId->value());
         return $principle;
         
     }
 
    public function delete(PrincipleId $principleId){
        
       $principle= $this->eloquentPrincipleModel->findOrFail($principleId->value());
        $principle->delete();
        
        
    }


   
   
}
