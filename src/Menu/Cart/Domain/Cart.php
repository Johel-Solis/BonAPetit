<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Domain;
use Src\Menu\Cart\Domain\ValueObjects\CartDate;
use Src\Menu\Cart\Domain\ValueObjects\CartId;
use Src\Menu\Cart\Domain\ValueObjects\CartTotalCost;



final class Cart
{
    private $id;
    private $totalCost;
    private $date;
    private $plateEspecials=array();
    private $plateExecutives=array();
   
  



    public function __construct(
        CartTotalCost $totalCost,
        CartDate $date,
        Array $plateEspecials,
        Array $plateExecutives
        
    )
    {
        $this->totalCost  = $totalCost;
        $this->date = $date;
        $this->plateEspecials  = $plateEspecials;
        $this->plateExecutives  = $plateExecutives;

        
    }

    public function id(): CartId
    {
        return $this->id;
    }
    public function totalCost(): CartTotalCost
    {
        return $this->totalCost;
    }

    public function date(): CartDate
    {
        return $this->date;
    }
   
    public function plateEspecials() :Array
    {
        return $this->plateEspecials;
    }

    public function plateExecutives() :Array
    {
        return $this->plateExecutives;
    }

   
    public function setId(CartId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        CartTotalCost $totalCost,
        CartDate $date,
        Array $plateEspecials,
        Array $plateExecutives
      
    ): self
    {
        $cart = new self( $totalCost,$date,$plateEspecials,$plateExecutives);

        return $cart;
        
    }
}
