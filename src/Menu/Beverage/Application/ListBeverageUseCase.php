<?php

declare(strict_types=1);

namespace Src\Menu\Beverage\Application;


use Src\Menu\Beverage\Domain\Contracts\BeverageRepositoryContract;
use Src\Menu\Beverage\Domain\Beverage;


final class listBeverageUseCase
{
    private $repository;

    public function __construct(BeverageRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {

        return  $this->repository->list();
    }
}
