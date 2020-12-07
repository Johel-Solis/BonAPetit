<?php

declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\PlateExecutive\Domain\Contracts\PlateSpecialRepositoryContract;
use Src\Menu\PlateExecutive\Domain\PlateSpecial;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveObservation;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveCost;




final class CreatePlateSpecialUseCase
{
    private $repository;

    public function __construct(PlateSpecialRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( int $cost,string $observation, int $plateEspecial)
    {
       $pCost= new PlateExecutiveCost($cost);
     
       

        $plateEspecial_C = PlateSpecial::create( $pCost,$observation,$plateEspecial);

        return  $this->repository->save($plateEspecial_C);
    }
}
