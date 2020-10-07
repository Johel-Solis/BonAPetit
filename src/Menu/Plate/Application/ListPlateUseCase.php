<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Application;


use Src\Menu\Plate\Domain\Contracts\PlateRepositoryContract;
use Src\Menu\Plate\Domain\Plate;


final class listPlateUseCase
{
    private $repository;

    public function __construct(PlateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {

        return  $this->repository->list();
    }
}
