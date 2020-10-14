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
    

    public function __construct(
        SoupName $name
    )
    {
        $this->name              = $name;
    
        
    }

    public function id(): SoupId
    {
        return $this->id;
    }

    public function name(): SoupName
    {
        return $this->name;
    }


    public function setId(SoupId $id) : void
    {
        $this->id=$id;
    } 
    

    public static function create(
        SoupName $name
    ): self
    {
        $soup = new self( $name);

        return $soup;
    }
}
