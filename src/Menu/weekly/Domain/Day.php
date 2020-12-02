<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Domain;
use Src\Menu\Weekly\Domain\ValueObjects\DayDate;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;


final class Day
{
    private $id;
    private $day_week;
  



    public function __construct(
        DayDate $day_week
    )
    {
        $this->day_week  = $day_week;
        
    }

    public function id(): DayId
    {
        return $this->id;
    }

    public function day_week(): DayDate
    {
        return $this->day_week;
    }
   
   

    public function setId(DayId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        DayDate $day_week
    ): self
    {
        $Day = new self( $day_week);

        return $Day;
    }
}
