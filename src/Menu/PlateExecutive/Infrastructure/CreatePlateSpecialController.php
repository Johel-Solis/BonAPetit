<?php

declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\PlateExecutive\Application\CreatePlateSpecialUseCase;
use Src\Menu\PlateExecutive\Infrastructure\Repositories\EloquentPlateSpecialRepository;





final class CreatePlateSpecialController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPlateSpecialRepository();
       
    }

    public function __invoke(int $cost,string $observation, int $platoE)
    {
       
        $createPlateSpecialUseCase = new CreatePlateSpecialUseCase($this->repository);
         $plateEspecial =$createPlateSpecialUseCase->__invoke($cost,$observation,$platoE);
         return $plateEspecial->id;
      
    }
}
