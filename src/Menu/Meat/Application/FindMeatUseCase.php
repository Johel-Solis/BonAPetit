<?php

declare(strict_types=1);

namespace Src\Menu\Meat\Application;


use Src\Menu\Meat\Domain\Contracts\MeatRepositoryContract;
use Src\Menu\Meat\Domain\ValueObjects\MeatId;

final class FindMeatUseCase
{
    private $repository;

    public function __construct(MeatRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(int $id)
    {
        $meatId = new MeatId($id);

         return $this->repository->find($meatId);
    }
}
