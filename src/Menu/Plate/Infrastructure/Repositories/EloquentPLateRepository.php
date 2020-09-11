<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Infrastructure\Repositories;

use App\User as EloquentUserModel;
use Src\Menu\Plate\Domain\Contracts\PlateRepositoryContract;
use Src\Menu\Plate\Domain\Plate;
use Src\Menu\Plate\Domain\ValueObjects\PlateId;
use Src\Menu\Plate\Domain\ValueObjects\PlateName;
use Src\Menu\Plate\Domain\ValueObjects\PlateDescription;
use Src\Menu\Plate\Domain\ValueObjects\PlatePrecio;


final class EloquentPlateRepository implements PlateRepositoryContract
{
    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }



    public function save(Plate $plate): void
    {
        $newPlate = $this->eloquentUserModel;

        $data = [
            'id'              => $plate->id()->value(),
            'name'             => $plate->name()->value(),
            'description' => $plate->description()->value(),
            'precio'          => $plate->precio()->value()
           
        ];

        $newPlate->create($data);
    }

}
?>