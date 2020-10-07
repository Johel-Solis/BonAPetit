<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Application;


use Src\Menu\Plate\Domain\Contracts\PlateRepositoryContract;
use Src\Menu\Plate\Domain\Plate;
use Src\Menu\Plate\Domain\ValueObjects\PlateName;
use Src\Menu\Plate\Domain\ValueObjects\PlateDescription;
use Src\Menu\Plate\Domain\ValueObjects\PlateId;
use Src\Menu\Plate\Domain\ValueObjects\PlatePhoto;
use Src\Menu\Plate\Domain\ValueObjects\PlatePrecio;

final class UpdatePlateUseCase
{
    private $repository;

    public function __construct(PlateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $plateId, string $plateName, string $plateDescription, int $platePrecio, string $platePhoto): void
    {
        $id                =new PlateId($plateId);
        $name              = new PlateName($plateName);
        $description       = new PlateDescription($plateDescription);
        $precio            = new PlatePrecio($platePrecio);
        $photo             = new PlatePhoto($platePhoto);


        $plate = Plate::create( $name, $description, $precio,$photo);

        $this->repository->update($id, $plate);
    }
}
