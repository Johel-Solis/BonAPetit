<?php

declare(strict_types=1);

namespace Src\Menu\Meat\Application;


use Src\Menu\Meat\Domain\Contracts\MeatRepositoryContract;
use Src\Menu\Meat\Domain\Meat;
use Src\Menu\Meat\Domain\ValueObjects\MeatName;

use Src\Menu\Meat\Domain\ValueObjects\MeatId;
use Src\Menu\Meat\Domain\ValueObjects\MeatPhoto;


final class UpdateMeatUseCase
{
    private $repository;

    public function __construct(MeatRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $meatId, string $meatName, string $meatPhoto): void
    {
        $id                =new MeatId($meatId);
        $name              = new MeatName($meatName);
       
        $photo             = new MeatPhoto($meatPhoto);


        $meat = Meat::create( $name,$photo);

        $this->repository->update($id, $meat);
    }
}
