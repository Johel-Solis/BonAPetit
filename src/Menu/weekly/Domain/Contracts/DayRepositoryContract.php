<?php
declare(strict_types=1);

namespace Src\Menu\Weekly\Domain\Contracts;

use Src\Menu\Weekly\Domain\Day;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;

interface DayRepositoryContract
{

    public function save(Day $day):Day;
    public function list();
    public function find(DayId $dayId);
    public function delete(DayId $dayId);








}
