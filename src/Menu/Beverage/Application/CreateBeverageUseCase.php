<?php

declare(strict_types=1);

namespace Src\Menu\Beverage\Application;


use Src\Menu\Beverage\Domain\Contracts\BeverageRepositoryContract;
use Src\Menu\Beverage\Domain\Beverage;
use Src\Menu\Beverage\Domain\ValueObjects\BeverageName;


final class CreateBeverageUseCase
{
    private $repository;

    public function __construct(BeverageRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( string $beverageName): void
    {
        $name     = new BeverageName($beverageName);

        $beverage = Beverage::create( $name);

        $this->repository->save($beverage);
    }
}
