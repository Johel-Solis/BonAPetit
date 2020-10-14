<?php

declare(strict_types=1);

namespace Src\Menu\Principle\Application;


use Src\Menu\Principle\Domain\Contracts\PrincipleRepositoryContract;
use Src\Menu\Principle\Domain\ValueObjects\PrincipleId;

final class DeletePrincipleUseCase
{
    private $repository;

    public function __construct(PrincipleRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(int $id)
    {
        $principleId = new PrincipleId($id);

         return $this->repository->delete($principleId);
    }
}
