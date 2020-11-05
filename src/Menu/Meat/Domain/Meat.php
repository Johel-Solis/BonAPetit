<?php

declare(strict_types=1);

namespace Src\Menu\Meat\Domain;

use Src\Menu\Meat\Domain\ValueObjects\MeatName;
use Src\Menu\Meat\Domain\ValueObjects\MeatId;
use Src\Menu\Meat\Domain\ValueObjects\MeatPhoto;


final class Meat
{
    private $id;
    private $name;
    private $photo;
    

    public function __construct(
        MeatName $name,
        MeatPhoto $photo
    )
    {
        $this->name       = $name;
        $this->photo      =$photo;

    }

    public function id(): MeatId
    {
        return $this->id;
    }

    public function name(): MeatName
    {
        return $this->name;
    }
    public function photo(): MeatPhoto
    {
        return $this->photo;
    }

    public function setId(MeatId $id) : void
    {
        $this->id=$id;
    } 
    

    public static function create(
        MeatName $name,
        MeatPhoto $photo
    ): self
    {
        $meat = new self( $name, $photo);

        return $meat;
    }
}
