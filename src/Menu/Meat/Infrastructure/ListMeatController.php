<?php

declare(strict_types=1);
namespace Src\Menu\Meat\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Meat\Application\ListMeatUseCase;
use Src\Menu\Meat\Infrastructure\Repositories\EloquentMeatRepository;



final class ListMeatController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentMeatRepository();
    }

    public function __invoke()
    {
        
        
        $listMeatUseCase = new ListMeatUseCase($this->repository);
        return $listMeatUseCase->__invoke();
        
    }
}