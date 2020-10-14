<?php

declare(strict_types=1);

namespace Src\Menu\Principle\Application;


use Src\Menu\Principle\Domain\Contracts\PrincipleRepositoryContract;
use Src\Menu\Principle\Domain\Principle;
use Src\Menu\Principle\Domain\ValueObjects\PrincipleName;



final class CreatePrincipleUseCase
{
    private $repository;

    public function __construct(PrincipleRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( string $principleName): void
    {
        $name              = new PrincipleName($principleName);
        

        $principle = Principle::create( $name);

        $this->repository->save($principle);
    }
}
