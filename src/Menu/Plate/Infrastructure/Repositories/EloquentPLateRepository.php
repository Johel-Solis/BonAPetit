<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Infrastructure\Repositories;

use App\Plate as EloquentPlateModel;
use Src\Menu\Plate\Domain\Contracts\PlateRepositoryContract;
use Src\Menu\Plate\Domain\Plate;
use Src\Menu\Plate\Domain\ValueObjects\PlateId;
use Src\Menu\Plate\Domain\ValueObjects\PlateName;
use Src\Menu\Plate\Domain\ValueObjects\PlateDescription;
use Src\Menu\Plate\Domain\ValueObjects\PlatePrecio;


final class EloquentPlateRepository implements PlateRepositoryContract
{
    private $eloquentPlaterModel;

    public function __construct()
    {
        $this->eloquentPlateModel = new EloquentPlateModel;
    }



    public function save(Plate $plate): void
    {
        $newPlate = $this->eloquentPlateModel;

        $data = [
            'name'             => $plate->name()->value(),
            'description' => $plate->description()->value(),
            'precio'          => $plate->precio()->value()
           
        ];

        $newPlate->create($data);
    }

}
?>