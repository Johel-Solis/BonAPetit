<?php

declare(strict_types=1);

namespace Src\Menu\weekly\Application;


use Src\Menu\weekly\Domain\Contracts\DayRepositoryContract;
use Src\Menu\weekly\Domain\Day;


final class ListDayUseCase
{
    private $repository;

    public function __construct(DayRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {

        return  $this->repository->list();
    }
}
