<?php

declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Domain;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveObservation;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveId;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveCost;



final class PlateExecutive
{
    private $id;
    private $cost;
    private $observation;
    private $soup;
    private $principle;
    private $beverage;
    private $meat; 
  



    public function __construct(
      
        PlateExecutiveCost $cost,
        string $observation,
        int $soup,
        int $principle,
        int $meat,
        int $beverage
        
    )
    {
      
        $this->cost  = $cost;
        $this->observation  = $observation;
        $this->soup  = $soup;
        $this->principle  = $principle;
        $this->meat  = $meat;
        $this->beverage  = $beverage;
        
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
   
    public function soup(): int
    {
        return $this->soup;
    }

    public function meat(): int
    {
        return $this->meat;
    }
    public function principle(): int
    {
        return $this->principle;
    }

    public function beverage(): int
    {
        return $this->beverage;
    }

    public function setId(PlateExecutiveId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        PlateExecutiveCost $cost,
        string $observation,
        int $soup,
        int $principle,
        int $meat,
        int $beverage
    ): self
    {
        $plateExecutive = new self( $cost,$observation,$soup,$principle,$meat,$beverage);

        return $plateExecutive;
    }
}
