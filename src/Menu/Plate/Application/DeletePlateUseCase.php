<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Application;


use Src\Menu\Plate\Domain\Contracts\PlateRepositoryContract;
use Src\Menu\Plate\Domain\ValueObjects\PlateId;

final class DeletePlateUseCase
{
    private $repository;

    public function __construct(PlateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(int $plateId): void
    {
        $id = new PlateId($plateId);

         $this->repository->delete($id);
    }
}
