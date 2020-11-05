<?php

declare(strict_types=1);

namespace Src\Menu\Soup\Domain;

use Src\Menu\Soup\Domain\ValueObjects\SoupName;
use Src\Menu\Soup\Domain\ValueObjects\SoupId;
use Src\Menu\Soup\Domain\ValueObjects\SoupDescription;
use Src\Menu\Soup\Domain\ValueObjects\SoupPrecio;
use Src\Menu\Soup\Domain\ValueObjects\SoupPhoto;


final class Soup
{
    private $id;
    private $name;
    Private $photo;
    

    public function __construct(
        SoupName $name,
        SoupPhoto $photo
    )
    {
        $this->name              = $name;
        $this->photo             =$photo;
    
        
    }

    public function id(): SoupId
    {
        return $this->id;
    }

    public function name(): SoupName
    {
        return $this->name;
    }
    public function photo(): SoupPhoto
    {
        return $this->photo;
    }


    public function setId(SoupId $id) : void
    {
        $this->id=$id;
    } 
    

    public static function create(
        SoupName $name,
        SoupPhoto $photo
    ): self
    {
        $soup = new self( $name, $photo);

        return $soup;
    }
}
