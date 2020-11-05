<?php

declare(strict_types=1);

namespace Src\Menu\Beverage\Domain;

use Src\Menu\Beverage\Domain\ValueObjects\BeverageName;
use Src\Menu\Beverage\Domain\ValueObjects\BeverageId;
use Src\Menu\Beverage\Domain\ValueObjects\BeveragePhoto;

final class Beverage
{
    private $id;
    private $name;
    private $photo;
   

    public function __construct(
        BeverageName $name,
        BeveragePhoto $photo
    )
    {
        $this->name     = $name;
        $this->photo    =$photo;
        
        
    }

    public function id(): BeverageId
    {
        return $this->id;
    }

    public function name(): BeverageName
    {
        return $this->name;
    }
    public function photo(): BeveragePhoto
    {
        return $this->photo;
    }


    public function setId(BeverageId $id) : void
    {
        $this->id=$id;
    } 
    

    public static function create(
        BeverageName $name,
        BeveragePhoto $photo
    ): self
    {
        $beverage = new self( $name,$photo);

        return $beverage;
    }
}
