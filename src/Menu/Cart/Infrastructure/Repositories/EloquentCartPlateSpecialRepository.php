<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Infrastructure\Repositories;

use App\Cart_PlateSpecial as EloquentCartPlateSpecialModel;
use Src\Menu\Cart\Domain\Contracts\CartPlateSpecialRepositoryContract;
use Src\Menu\Cart\Domain\CartPlateSpecial;
use Src\Menu\Cart\Domain\ValueObjects\CartId;


final class EloquentCartPlateSpecialRepository implements CartPlateSpecialRepositoryContract
{
   private $eloquentCartPlateSpecialModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentCartPlateSpecialModel= new EloquentCartPlateSpecialModel();
    }


    public function save(CartPlateSpecial $cartplateS): void
    {
        foreach($cartplateS->plateSpecials() as $plaid) {
            $newCartP                = new EloquentCartPlateSpecialModel();
            $newCartP->cart_id        =$cartplateS->cart()->value();
            $newCartP->plate_special_id = $plaid;
            $newCartP->save();
        }



    }

  

     public function delete(CartId $cartId){


      $cartplate= $this->EloquentCartPlateSpecialModel->findOrFail($cartId->value());
      $cartplate->delete();

    }




}
