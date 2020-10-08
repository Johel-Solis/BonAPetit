<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Application;


use Src\Menu\Plate\Domain\Contracts\PlateRepositoryContract;
use Src\Menu\Plate\Domain\ValueObjects\PlateId;

final class FindPlateUseCase
{
    private $repository;

    public function __construct(PlateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(int $id)
    {
        $plateId = new PlateId($id);

         return $this->repository->find($plateId);
    }
}
