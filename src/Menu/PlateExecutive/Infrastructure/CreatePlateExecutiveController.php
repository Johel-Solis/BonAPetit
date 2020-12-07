<?php

declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\PlateExecutive\Application\CreatePlateExecutiveUseCase;
use Src\Menu\PlateExecutive\Infrastructure\Repositories\EloquentPlateExecutiveRepository;





final class CreatePlateExecutiveController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPlateExecutiveRepository();
       
    }

    public function __invoke(int $cost,string $observation, int $soup, int $principle,int $meat,int $beverage)
    {
       
        $createPlateExecutiveUseCase = new CreatePlateExecutiveUseCase($this->repository);
         $plateExecutive =$createPlateExecutiveUseCase->__invoke($cost,$observation,$soup,$principle,$meat,$beverage);
         return$plateExecutive->id;
      
    }
}
