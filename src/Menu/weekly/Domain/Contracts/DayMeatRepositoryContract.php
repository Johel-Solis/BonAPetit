<?php
declare(strict_types=1);

namespace Src\Menu\Weekly\Domain\Contracts;

use Src\Menu\Weekly\Domain\DayMeat;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;

interface DayMeatRepositoryContract
{

    public function save(DayMeat $daymeat): void;
    public function update(DayId $dayId,DayMeat $dayMeat): void;
    public function list();
    public function find(DayId $dayId);
    public function delete(DayId $dayId);








}
