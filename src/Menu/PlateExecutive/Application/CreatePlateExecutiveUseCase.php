<?php

declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\PlateExecutive\Domain\Contracts\PlateExecutiveRepositoryContract;
use Src\Menu\PlateExecutive\Domain\PlateExecutive;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveObservation;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveCost;




final class CreatePlateExecutiveUseCase
{
    private $repository;

    public function __construct(PlateExecutiveRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( int $cost,string $observation, int $soup, int $principle,int $meat,int $beverage)
    {
       $pCost= new PlateExecutiveCost($cost);
      
       

        $plateExecutive = PlateExecutive::create( $pCost,$observation,$soup,$principle,$meat,$beverage);

        return $this->repository->save($plateExecutive);
    }
}
