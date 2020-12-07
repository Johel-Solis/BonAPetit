<?php

declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Domain;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveObservation;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveId;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveCost;



final class PlateSpecial
{
    private $id;
    private $cost;
    private $observation;
    private $plate;
   
  



    public function __construct(
        PlateExecutiveCost $cost,
        string $observation,
        int $plate
        
    )
    {
     
        $this->cost  = $cost;
        $this->observation  = $observation;
        $this->plate  = $plate;
        
    }

    public function id(): PlateExecutiveId
    {
        return $this->id;
    }
    public function cost(): PlateExecutiveCost
    {
        return $this->cost;
    }

    public function observation(): string
    {
        return $this->observation;
    }
   
    public function plate(): int
    {
        return $this->plate;
    }

   
    public function setId(PlateExecutiveId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        PlateExecutiveCost $cost,
        string $observation,
        int $plate
      
    ): self
    {
        $platespecial = new self( $cost,$observation,$plate);

        return $platespecial;
        
    }
}
