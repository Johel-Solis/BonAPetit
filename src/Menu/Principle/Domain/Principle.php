<?php

declare(strict_types=1);

namespace Src\Menu\Principle\Domain;

use Src\Menu\Principle\Domain\ValueObjects\PrincipleName;
use Src\Menu\Principle\Domain\ValueObjects\PrincipleId;
use Src\Menu\Principle\Domain\ValueObjects\PrinciplePhoto;



final class Principle
{
    private $id;
    private $name;
    private $photo;
   
    

    public function __construct(
        PrincipleName $name,
        PrinciplePhoto $photo
    )
    {
        $this->name      = $name;
        $this->photo     =$photo;      
    
    }

    public function id(): PrincipleId
    {
        return $this->id;
    }

    public function name(): PrincipleName
    {
        return $this->name;
    }

    public function photo(): PrinciplePhoto
    {
        return $this->photo;
    }

    public function setId(PrincipleId $id) : void
    {
        $this->id=$id;
    } 
    

    public static function create(
        PrincipleName $name,
        PrinciplePhoto $photo
    ): self
    {
        $principle = new self($name,$photo);

        return $principle;
    }
}
