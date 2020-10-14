<?php

declare(strict_types=1);

namespace Src\Menu\Principle\Application;


use Src\Menu\Principle\Domain\Contracts\PrincipleRepositoryContract;
use Src\Menu\Principle\Domain\Principle;


final class listPrincipleUseCase
{
    private $repository;

    public function __construct(PrincipleRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {

        return  $this->repository->list();
    }
}
