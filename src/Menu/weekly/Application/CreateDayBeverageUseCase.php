<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\Weekly\Domain\Contracts\DayBeverageRepositoryContract;
use Src\Menu\Beverage\Domain\Beverage;
use Src\Menu\Weekly\Domain\DayBeverage;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;



final class CreateDayBeverageUseCase
{
    private $repository;

    public function __construct(DayBeverageRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( DayId $day, Array $beverages): void
    {
       

        $dayBeverage = DayBeverage::create( $day,$beverages);

        $this->repository->save($dayBeverage);
    }
}
