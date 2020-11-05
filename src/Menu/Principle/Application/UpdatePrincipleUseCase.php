<?php

declare(strict_types=1);

namespace Src\Menu\Principle\Application;


use Src\Menu\Principle\Domain\Contracts\PrincipleRepositoryContract;
use Src\Menu\Principle\Domain\Principle;
use Src\Menu\Principle\Domain\ValueObjects\PrincipleName;
use Src\Menu\Principle\Domain\ValueObjects\PrincipleId;
use Src\Menu\Principle\Domain\ValueObjects\PrinciplePhoto;


final class UpdatePrincipleUseCase
{
    private $repository;

    public function __construct(PrincipleRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $principleId, string $principleName, string $principlePhoto): void
    {
        $id                =new PrincipleId($principleId);
        $name              = new PrincipleName($principleName);
        $photo             = new PrinciplePhoto($principlePhoto);


        $principle = Principle::create( $name,$photo);

        $this->repository->update($id, $principle);
    }
}
