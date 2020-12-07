<?php

declare(strict_types=1);

namespace Src\Menu\weekly\Application;


use Src\Menu\weekly\Domain\Contracts\DayRepositoryContract;


final class FindDayUseCase
{
    private $repository;

    public function __construct(DayRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(int $id)
    {
        

         return $this->repository->find($id);
    }
}
