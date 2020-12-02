<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Domain;

use ArrayObject;
use PhpParser\Node\Expr\Cast\Array_;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;
use Src\Menu\Principle\Domain\principle;

final class DayPrinciple
{
    private $id;
    private $day;
    private $principles=array();



    public function __construct(
        DayId $day,
        Array  $principles

    )
    {
        $this->day  = $day;
        $this->principles=$principles;
    }

    public function id(): DayId
    {
        return $this->id;
    }

    public function day(): DayId
    {
        return $this->day;
    }
    public function principles(): Array
    {
        return $this->principles;
    }
    public function setPrinciples(Array $principles) : void
    {
        $this->principles=$principles;
    }

    public function setId(DayId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        DayId $day,
        Array $principles
    ): self
    {
        $Day = new self( $day, $principles);

        return $Day;
    }
}
