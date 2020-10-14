<?php

declare(strict_types=1);
namespace Src\Menu\Beverage\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Beverage\Application\ListBeverageUseCase;
use Src\Menu\Beverage\Infrastructure\Repositories\EloquentBeverageRepository;



final class ListBeverageController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentBeverageRepository();
    }

    public function __invoke()
    {
        
        
        $listBeverageUseCase = new ListBeverageUseCase($this->repository);
        return $listBeverageUseCase->__invoke();
        
    }
}