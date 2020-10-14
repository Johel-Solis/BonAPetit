<?php

declare(strict_types=1);

namespace Src\Menu\Beverage\Infrastructure\Repositories;

use App\Beverage as EloquentBeverageModel;
use Src\Menu\Beverage\Domain\Contracts\BeverageRepositoryContract;
use Src\Menu\Beverage\Domain\Beverage;
use Src\Menu\Beverage\Domain\ValueObjects\BeverageId;


final class EloquentBeverageRepository implements BeverageRepositoryContract
{
   private $eloquentBeverageModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentBeverageModel= new EloquentBeverageModel();
    }


    public function save(Beverage $beverage): void
    {
        
        $newBeverage                = new EloquentBeverageModel();
        $newBeverage->name          =$beverage->name()->value();

        $newBeverage->save();
    }


    
    public function list(){
        return $this->eloquentBeverageModel::paginate(15);
    }
    public function find(BeverageId $beverageId)
    {
        $beverage= $this->eloquentBeverageModel->findOrFail($beverageId->value());
         return $beverage;
         
     }
 
    public function delete(BeverageId $beverageId){
        
       $beverage= $this->eloquentBeverageModel->findOrFail($beverageId->value());
        
        $beverage->delete();
        
        
    }


   
   
}
