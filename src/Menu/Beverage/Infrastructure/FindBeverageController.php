<?php

declare(strict_types=1);
namespace Src\Menu\Beverage\Infrastructure;

use Src\Menu\Beverage\Application\FindBeverageUseCase;
use Src\Menu\Beverage\Domain\Beverage;
use Src\Menu\Beverage\Infrastructure\Repositories\EloquentBeverageRepository;

final class FindBeverageController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentBeverageRepository();
    }

    public function __invoke(int $id)
    {
        
        $findBeverageUseCase = new FindBeverageUseCase($this->repository);
        $beverage=$findBeverageUseCase->__invoke($id);
        return $beverage;
        
    }
}