<?php

declare(strict_types=1);

namespace Src\Menu\Principle\Domain;

use Src\Menu\Principle\Domain\ValueObjects\PrincipleName;
use Src\Menu\Principle\Domain\ValueObjects\PrincipleId;


final class Principle
{
    private $id;
    private $name;
   
    

    public function __construct(
        PrincipleName $name
    )
    {
        $this->name              = $name;
    
    }

    public function id(): PrincipleId
    {
        return $this->id;
    }

    public function name(): PrincipleName
    {
        return $this->name;
    }



    public function setId(PrincipleId $id) : void
    {
        $this->id=$id;
    } 
    

    public static function create(
        PrincipleName $name
    ): self
    {
        $principle = new self($name);

        return $principle;
    }
}
