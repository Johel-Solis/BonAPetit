<?php

declare(strict_types=1);

namespace Src\Menu\Beverage\Application;


use Src\Menu\Beverage\Domain\Contracts\BeverageRepositoryContract;
use Src\Menu\Beverage\Domain\Beverage;
use Src\Menu\Beverage\Domain\ValueObjects\BeverageName;
use Src\Menu\Beverage\Domain\ValueObjects\BeverageId;
use Src\Menu\Beverage\Domain\ValueObjects\BeveragePhoto;


final class UpdateBeverageUseCase
{
    private $repository;

    public function __construct(BeverageRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $beverageId, string $beverageName,  string $beveragePhoto): void
    {
        $id                =new BeverageId($beverageId);
        $name              = new BeverageName($beverageName);
        $photo             = new BeveragePhoto($beveragePhoto);


        $beverage = Beverage::create( $name, $photo);

        $this->repository->update($id, $beverage);
    }
}
