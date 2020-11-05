<?php

declare(strict_types=1);

namespace Src\Menu\Soup\Application;


use Src\Menu\Soup\Domain\Contracts\SoupRepositoryContract;
use Src\Menu\Soup\Domain\Soup;
use Src\Menu\Soup\Domain\ValueObjects\SoupName;
use Src\Menu\Soup\Domain\ValueObjects\SoupId;
use Src\Menu\Soup\Domain\ValueObjects\SoupPhoto;


final class UpdateSoupUseCase
{
    private $repository;

    public function __construct(SoupRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $soupId, string $soupName, string $soupPhoto): void
    {
        $id                =new SoupId($soupId);
        $name              = new SoupName($soupName);
        $photo             = new SoupPhoto($soupPhoto);


        $soup = Soup::create( $name,$photo);

        $this->repository->update($id, $soup);
    }
}
