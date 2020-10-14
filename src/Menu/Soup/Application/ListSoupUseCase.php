<?php

declare(strict_types=1);

namespace Src\Menu\Soup\Application;


use Src\Menu\Soup\Domain\Contracts\SoupRepositoryContract;
use Src\Menu\Soup\Domain\Soup;


final class listSoupUseCase
{
    private $repository;

    public function __construct(SoupRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {

        return  $this->repository->list();
    }
}
