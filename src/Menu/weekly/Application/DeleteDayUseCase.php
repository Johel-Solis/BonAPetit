<?php

declare(strict_types=1);

namespace Src\Menu\weekly\Application;


use Src\Menu\weekly\Domain\Contracts\DayRepositoryContract;
use Src\Menu\weekly\Domain\ValueObjects\DayId;

final class DeleteDayUseCase
{
    private $repository;

    public function __construct(DayRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(int $id)
    {
        $dayId = new DayId($id);

         return $this->repository->delete($dayId);
    }
}
