<?php
declare(strict_types=1);

namespace Src\Menu\Weekly\Domain\Contracts;

use Src\Menu\Weekly\Domain\DayBeverage;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;

interface DayBeverageRepositoryContract
{

    public function save(DayBeverage $dayBeverage): void;
    public function update(DayId $dayId,DayBeverage $dayBeverage): void;
    public function list();
    public function find(DayId $dayId);
    public function delete(DayId $dayId);








}
