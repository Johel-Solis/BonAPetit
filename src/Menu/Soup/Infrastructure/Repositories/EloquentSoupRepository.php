<?php

declare(strict_types=1);

namespace Src\Menu\Soup\Infrastructure\Repositories;

use App\Soup as EloquentSoupModel;
use Src\Menu\Soup\Domain\Contracts\SoupRepositoryContract;
use Src\Menu\Soup\Domain\Soup;
use Src\Menu\Soup\Domain\ValueObjects\SoupId;


final class EloquentSoupRepository implements SoupRepositoryContract
{
   private $eloquentSoupModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentSoupModel= new EloquentSoupModel();
    }


    public function save(Soup $soup): void
    {
        $newSoup                = new EloquentSoupModel();
        $newSoup->name          =$soup->name()->value();
        $newSoup->photo          =$soup->photo()->value();

        $newSoup->save();
    }

    public function update(SoupId $soupId,Soup $soup): void
    {
        $soupToUpdate = new EloquentSoupModel();


        $data = [
            'name'          =>$soup->name()->value(),
            'photo'         =>$soup->photo()->value(),
        ];

        $soupToUpdate
            ->findOrFail($soupId->value())
            ->update($data);

    }



    public function list(){
        return $this->eloquentSoupModel::paginate(15);
    }
    public function find(SoupId $soupId)
    {
        $soup= $this->eloquentSoupModel->findOrFail($soupId->value());
         return $soup;

     }

    public function delete(SoupId $soupId){

       $soup= $this->eloquentSoupModel->findOrFail($soupId->value());
        $soup->delete();
    }




}
