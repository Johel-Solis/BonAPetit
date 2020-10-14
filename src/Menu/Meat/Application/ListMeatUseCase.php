<?php

declare(strict_types=1);

namespace Src\Menu\Meat\Application;


use Src\Menu\Meat\Domain\Contracts\MeatRepositoryContract;
use Src\Menu\Meat\Domain\Meat;


final class listMeatUseCase
{
    private $repository;

    public function __construct(MeatRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {

        return  $this->repository->list();
    }
}
