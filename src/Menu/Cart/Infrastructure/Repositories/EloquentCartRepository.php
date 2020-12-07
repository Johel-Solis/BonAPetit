<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Infrastructure\Repositories;

use App\Cart as EloquentCartModel;
use Src\Menu\Cart\Domain\Contracts\CartRepositoryContract;
use Src\Menu\Cart\Domain\Cart;
use Src\Menu\Cart\Domain\ValueObjects\CartId;


final class EloquentCartRepository implements CartRepositoryContract
{
   private $eloquentCartModel;
 /**
    *  __Construct method
    */
    public function __construct()
    {
        $this->eloquentCartModel= new EloquentCartModel();
    }


    public function save(Cart $cart): Cart
    {
    
            $newcart                = new EloquentCartModel();
            $newcart->date         =$cart->date()->value();
            $newcart->totalCost         =$cart->totalCost()->value();
             $newcart->save();
             
             $cart->setId(new CartId($newcart->id));
             return $cart;


    }

    public function update(CartId $dayId,Cart $day): void
    {
       
    }

    public function list()
    {
        
        
    }

    public function find(CartId $cartId)
    {
        $newDayP  = new EloquentCartModel();

        $day= $newDayP->findOrFail($dayId);
         return $day;

     }
     
     public function delete(CartId $cartId){
        $newDayP                = new EloquentCartModel();

         $cart= $newDayP->findOrFail($cartId->value());
    

        $cart->delete();

    }




}
