<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Domain;

use ArrayObject;
use PhpParser\Node\Expr\Cast\Array_;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;
use Src\Menu\Soup\Domain\Soup;

final class DaySoup
{
    private $id;
    private $day;
    private $soups=array();



    public function __construct(
        DayId $day,
        Array  $soups

    )
    {
        $this->day  = $day;
        $this->soups=$soups;
    }

    public function id(): DayId
    {
        return $this->id;
    }

    public function day(): DayId
    {
        return $this->day;
    }
    public function soups(): Array
    {
        return $this->soups;
    }
    public function setSoups(Array $soups) : void
    {
        $this->soups=$soups;
    }

    public function setId(DayId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        DayId $day,
        Array $soups
    ): self
    {
        $Day = new self( $day, $soups);

        return $Day;
    }
}
