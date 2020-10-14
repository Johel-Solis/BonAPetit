<?php

declare(strict_types=1);
namespace Src\Menu\Beverage\Infrastructure;

use Src\Menu\Beverage\Application\DeleteBeverageUseCase;
use Src\Menu\Beverage\Infrastructure\Repositories\EloquentBeverageRepository;


final class DeleteBeverageController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentBeverageRepository();
    }

    public function __invoke(int $id)
    {
        
        $deleteBeverageUseCase = new DeleteBeverageUseCase($this->repository);
        $deleteBeverageUseCase->__invoke($id);
       
    }
}