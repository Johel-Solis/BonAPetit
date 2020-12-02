<?php

declare(strict_types=1);

namespace Src\Menu\Weekly\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\Weekly\Domain\Contracts\DayPrincipleRepositoryContract;
use Src\Menu\Principle\Domain\Principle;
use Src\Menu\Weekly\Domain\DayPrinciple;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;



final class CreateDayPrincipleUseCase
{
    private $repository;

    public function __construct(DayPrincipleRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( DayId $dayD, Array $Principles): void
    {
        
        $dayPrinciple = DayPrinciple::create( $dayD,$Principles);

        $this->repository->save($dayPrinciple);
    }
}
