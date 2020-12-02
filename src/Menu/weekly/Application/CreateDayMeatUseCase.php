<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\Weekly\Domain\Contracts\DayMeatRepositoryContract;
use Src\Menu\Meat\Domain\Meat;
use Src\Menu\Weekly\Domain\DayMeat;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;



final class CreateDayMeatUseCase
{
    private $repository;

    public function __construct(DayMeatRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( DayId $dayD, Array $Meats): void
    {
        

        $dayMeat = DayMeat::create( $dayD,$Meats);

        $this->repository->save($dayMeat);
    }
}
