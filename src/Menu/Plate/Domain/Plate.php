<?php

declare(strict_types=1);

namespace src\Menu\Plate\Domain;

use src\Menu\Plate\Domain\ValueObjects\PlateName;
use src\Menu\Plate\Domain\ValueObjects\PlateId;
use src\Menu\Plate\Domain\ValueObjects\PlateDescription;
use src\Menu\Plate\Domain\ValueObjects\PlatePrecio;


final class Plate
{
    private $id;
    private $name;
    private $description;
    private $precio;
    

    public function __construct(
        PlateId $id,
        PlateName $name,
        PlateDescription $description,
        PlatePrecio $precio
    )
    {
        $this->id                = $id;
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

    

    public static function create(
        PlateId $id,
        PlateName $name,
        PlateDescription $description,
        PlatePrecio $precio  
    ): Plate
    {
        $plate = new self($id, $name, $description, $precio);

        return $plate;
    }
}
?>