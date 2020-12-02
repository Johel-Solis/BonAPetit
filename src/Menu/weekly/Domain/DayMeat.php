<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Domain;

use ArrayObject;
use PhpParser\Node\Expr\Cast\Array_;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;
use Src\Menu\Meat\Domain\Meat;

final class DayMeat
{
    private $id;
    private $day;
    private $meats=array();



    public function __construct(
        DayId $day,
        Array  $meats

    )
    {
        $this->day  = $day;
        $this->meats=$meats;
    }

    public function id(): DayId
    {
        return $this->id;
    }

    public function day(): DayId
    {
        return $this->day;
    }
    public function meats(): Array
    {
        return $this->meats;
    }
    public function setMeat(Array $meats) : void
    {
        $this->meats=$meats;
    }

    public function setId(DayId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        DayId $day,
        Array $meats
    ): self
    {
        $Day = new self( $day, $meats);

        return $Day;
    }
}
