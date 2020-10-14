<?php

declare(strict_types=1);
namespace Src\Menu\Meat\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Meat\Application\FindMeatUseCase;
use Src\Menu\Meat\Domain\Meat;
use Src\Menu\Meat\Infrastructure\Repositories\EloquentMeatRepository;

final class FindMeatController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentMeatRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $findMeatUseCase = new FindMeatUseCase($this->repository);
        $meat=$findMeatUseCase->__invoke($id);
        return $meat;
        
    }
}