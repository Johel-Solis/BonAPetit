<?php

declare(strict_types=1);

namespace Src\Menu\Beverage\Application;


use Src\Menu\Beverage\Domain\Contracts\BeverageRepositoryContract;
use Src\Menu\Beverage\Domain\ValueObjects\BeverageId;

final class FindBeverageUseCase
{
    private $repository;

    public function __construct(BeverageRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(int $id)
    {
        $beverageId = new BeverageId($id);

         return $this->repository->find($beverageId);
    }
}
