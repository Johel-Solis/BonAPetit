<?php

declare(strict_types=1);

namespace Src\Menu\Beverage\Domain;

use Src\Menu\Beverage\Domain\ValueObjects\BeverageName;
use Src\Menu\Beverage\Domain\ValueObjects\BeverageId;

final class Beverage
{
    private $id;
    private $name;
   

    public function __construct(
        BeverageName $name
    )
    {
        $this->name     = $name;
        
        
    }

    public function id(): BeverageId
    {
        return $this->id;
    }

    public function name(): BeverageName
    {
        return $this->name;
    }


    public function setId(BeverageId $id) : void
    {
        $this->id=$id;
    } 
    

    public static function create(
        BeverageName $name
    ): self
    {
        $beverage = new self( $name);

        return $beverage;
    }
}
