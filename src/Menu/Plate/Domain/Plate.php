<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Domain;

use Src\Menu\Plate\Domain\ValueObjects\PlateName;
use Src\Menu\Plate\Domain\ValueObjects\PlateId;
use Src\Menu\Plate\Domain\ValueObjects\PlateDescription;
use Src\Menu\Plate\Domain\ValueObjects\PlatePrecio;


final class Plate
{
    private $id;
    private $name;
    private $description;
    private $precio;
    

    public function __construct(
        PlateName $name,
        PlateDescription $description,
        PlatePrecio $precio
    )
    {
        $this->name              = $name;
        $this->description       = $description;
        $this->precio            = $precio;
        
    }

    public function id(): PlateId
    {
        return $this->id;
    }

    public function name(): PlateName
    {
        return $this->name;
    }

    public function description(): PlateDescription
    {
        return $this->description;
    }


    public function precio(): PlatePrecio
    {
        return $this->precio;
    }
    public function setId(PlateId $id) : void
    {
        $this->id=$id;
    } 
    

    public static function create(
        PlateName $name,
        PlateDescription $description,
        PlatePrecio $precio  
    ): self
    {
        $plate = new self( $name, $description, $precio);

        return $plate;
    }
}
