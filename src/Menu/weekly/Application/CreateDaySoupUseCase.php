<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\Weekly\Domain\Contracts\DaySoupRepositoryContract;
use Src\Menu\Soup\Domain\Soup;
use Src\Menu\Weekly\Domain\DaySoup;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;



final class CreateDaySoupUseCase
{
    private $repository;

    public function __construct(DaySoupRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( DayId $dayD, Array $Soups): void
    {
        

        $daySoup = DaySoup::create( $dayD,$Soups);

        $this->repository->save($daySoup);
    }
}
