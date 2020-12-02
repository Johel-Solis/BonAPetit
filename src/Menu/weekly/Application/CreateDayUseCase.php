<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\Weekly\Domain\Contracts\DayRepositoryContract;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;
use Src\Menu\Weekly\Domain\ValueObjects\DayDate;
use Src\Menu\Weekly\Domain\Day;



final class CreateDayUseCase
{
    private $repository;

    public function __construct(DayRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( string $dayDate): Day
    {
        $day  =new DayDate($dayDate);

        $day = Day::create( $day);

        return $this->repository->save($day);

    }
}
