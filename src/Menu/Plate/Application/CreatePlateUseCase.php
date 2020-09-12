<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Application;


use Src\Menu\Plate\Domain\Contracts\PlateRepositoryContract;
use Src\Menu\Plate\Domain\Plate;
use Src\Menu\Plate\Domain\ValueObjects\PlateId;
use Src\Menu\Plate\Domain\ValueObjects\PlateName;
use Src\Menu\Plate\Domain\ValueObjects\PlateDescription;
use Src\Menu\Plate\Domain\ValueObjects\PlatePrecio;


final class CreatePlateUseCase
{
    private $repository;

    public function __construct(PlateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $plateName,
        string $plateDescription,
        int $platePrecio
    ): void
    {
        $name              = new PlateName($plateName);
        $description       = new PlateDescription($plateDescription);
        $precio            = new PlatePrecio($platePrecio);

        $plate = Plate::create( $name, $description, $precio);

        $this->repository->save($plate);
    }
}
?>