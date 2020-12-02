<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Domain;

use ArrayObject;
use PhpParser\Node\Expr\Cast\Array_;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;
use Src\Menu\Beverage\Domain\Beverage;

final class DayBeverage
{
    private $id;
    private $day;
    private $beverages=array();



    public function __construct(
        DayId $day,
        Array  $beverages

    )
    {
        $this->day  = $day;
        $this->beverages=$beverages;
    }

    public function id(): DayId
    {
        return $this->id;
    }

    public function day(): DayId
    {
        return $this->day;
    }
    public function beverages(): Array
    {
        return $this->beverages;
    }
    public function setBeverages(Array $beverages) : void
    {
        $this->beverages=$beverages;
    }

    public function setId(DayId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        DayId $day,
        Array $beverages
    ): self
    {
        $Day = new self( $day, $beverages);

        return $Day;
    }
}
