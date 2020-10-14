<?php

declare(strict_types=1);

namespace Src\Menu\Meat\Domain;

use Src\Menu\Meat\Domain\ValueObjects\MeatName;
use Src\Menu\Meat\Domain\ValueObjects\MeatId;


final class Meat
{
    private $id;
    private $name;
    

    public function __construct(
        MeatName $name
    )
    {
        $this->name              = $name;
    }

    public function id(): MeatId
    {
        return $this->id;
    }

    public function name(): MeatName
    {
        return $this->name;
    }

    public function setId(MeatId $id) : void
    {
        $this->id=$id;
    } 
    

    public static function create(
        MeatName $name
    ): self
    {
        $meat = new self( $name);

        return $meat;
    }
}
