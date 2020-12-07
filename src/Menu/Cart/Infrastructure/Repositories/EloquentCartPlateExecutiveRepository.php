<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Infrastructure\Repositories;

use App\Cart_PlateExecutive as EloquentCartPlateExecutiveModel;
use Src\Menu\Cart\Domain\Contracts\CartPlateExecutiveRepositoryContract;
use Src\Menu\Cart\Domain\CartPlateExecutive;
use Src\Menu\Cart\Domain\ValueObjects\CartId;


final class EloquentCartPlateExecutiveRepository implements CartPlateExecutiveRepositoryContract
{
   private $eloquentCartPlateExecutiveModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentCartPlateExecutiveModel= new EloquentCartPlateExecutiveModel();
    }


    public function save(CartPlateExecutive $plateEx): void
    {
        foreach($plateEx->plateExecutives() as $plaid) {
            $newCartP                = new EloquentCartPlateExecutiveModel();
            $newCartP->cart_id        =$plateEx->cart()->value();
            $newCartP->plate_executive_id = $plaid;
            $newCartP->save();
        }



    }

   

     public function delete(CartId $cartId){


      $cartplate= $this->EloquentCartPlateExecutiveModel->findOrFail($cartId->value());
      $cartplate->delete();

    }




}
