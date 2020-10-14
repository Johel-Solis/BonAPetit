<?php

declare(strict_types=1);

namespace Src\Menu\Soup\Application;


use Src\Menu\Soup\Domain\Contracts\SoupRepositoryContract;
use Src\Menu\Soup\Domain\ValueObjects\SoupId;

final class FindSoupUseCase
{
    private $repository;

    public function __construct(SoupRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(int $id)
    {
        $soupId = new SoupId($id);

         return $this->repository->find($soupId);
    }
}
