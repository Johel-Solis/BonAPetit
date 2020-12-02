<?php

declare(strict_types=1);

namespace Src\Menu\weekly\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Weekly\Application\{CreateDayMeatUseCase,CreateDayBeverageUseCase,CreateDayPrincipleUseCase,CreateDaySoupUseCase,CreateDayUseCase};
use Src\Menu\Weekly\Infrastructure\Repositories\{EloquentDayMeatRepository,EloquentDayBeverageRepository,EloquentDayPrincipleRepository,EloquentDaySoupRepository,EloquentDayRepository};
use Src\Menu\Weekly\Domain\ValueObjects\DayId;




final class CreateDayController
{
    private $repositorySoup;
    private $repositoryMeat;
    private $repositoryPrinciple;
    private $repositoryBeverage;
    private $repositoryDay;


    public function __construct()
    {
        $this->repositoryDayMeat = new EloquentDayMeatRepository();
        $this->repositoryDaySoup = new EloquentDaySoupRepository();
        $this->repositoryDayPrinciple = new EloquentDayPrincipleRepository();
        $this->repositoryDayBeverage = new EloquentDayBeverageRepository();
        $this->repositoryDay = new EloquentDayRepository();
    }

    public function __invoke(Request $request)
    {
        $day_date    = $request->input('date');
        $principles  = $request->idprinciples;
        $meats       = $request->idmeats;
        $beverages   = $request->idbeverages;
        $soups       =$request->idsoups;
        $createDayUseCase = new CreateDayUseCase($this->repositoryDay);
         $day =$createDayUseCase->__invoke($day_date);
        $createDayMeatUseCase = new CreateDayMeatUseCase($this->repositoryDayMeat);
        $createDayMeatUseCase->__invoke($day->id(),$meats);

        $createDayPrincipleUseCase = new CreateDayPrincipleUseCase($this->repositoryDayPrinciple);
        $createDayPrincipleUseCase->__invoke($day->id(),$principles);

        $createDayBeverageUseCase = new CreateDayBeverageUseCase($this->repositoryDayBeverage);
        $createDayBeverageUseCase->__invoke($day->id(),$beverages);

        $createDaySoupUseCase = new CreateDaySoupUseCase($this->repositoryDaySoup);
        $createDaySoupUseCase->__invoke($day->id(),$soups);


    }
}
