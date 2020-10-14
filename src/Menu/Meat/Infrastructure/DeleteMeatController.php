<?php

declare(strict_types=1);
namespace Src\Menu\Meat\Infrastructure;


use Src\Menu\Meat\Application\DeleteMeatUseCase;
use Src\Menu\Meat\Infrastructure\Repositories\EloquentMeatRepository;


final class DeleteMeatController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentMeatRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $deleteMeatUseCase = new DeleteMeatUseCase($this->repository);
        $deleteMeatUseCase->__invoke($id);
        
        
    }
}