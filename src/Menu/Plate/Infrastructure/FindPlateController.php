<?php

declare(strict_types=1);
namespace Src\Menu\Plate\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Plate\Application\FindPlateUseCase;
use Src\Menu\Plate\Domain\Plate;
use Src\Menu\PLate\Infrastructure\Repositories\EloquentPLateRepository;

final class FindPlateController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPlateRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $findPlateUseCase = new FindPlateUseCase($this->repository);
        $plate=$findPlateUseCase->__invoke($id);
        return $plate;
        
    }
}