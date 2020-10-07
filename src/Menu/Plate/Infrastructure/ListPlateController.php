<?php

declare(strict_types=1);
namespace Src\Menu\Plate\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Plate\Application\ListPlateUseCase;
use Src\Menu\PLate\Infrastructure\Repositories\EloquentPLateRepository;



final class ListPlateController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPlateRepository();
    }

    public function __invoke()
    {
        
        
        $listPlateUseCase = new ListPlateUseCase($this->repository);
        return $listPlateUseCase->__invoke();
        
    }
}