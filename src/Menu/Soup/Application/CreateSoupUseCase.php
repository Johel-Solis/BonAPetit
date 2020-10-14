<?php

declare(strict_types=1);

namespace Src\Menu\Soup\Application;


use Src\Menu\Soup\Domain\Contracts\SoupRepositoryContract;
use Src\Menu\Soup\Domain\Soup;
use Src\Menu\Soup\Domain\ValueObjects\SoupName;



final class CreateSoupUseCase
{
    private $repository;

    public function __construct(SoupRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( string $soupName): void
    {
        $name = new SoupName($soupName);
        $soup = Soup::create( $name);

        $this->repository->save($soup);
    }
}
