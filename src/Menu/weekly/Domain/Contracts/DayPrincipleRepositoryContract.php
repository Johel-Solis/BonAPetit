<?php
declare(strict_types=1);

namespace Src\Menu\Weekly\Domain\Contracts;

use Src\Menu\Weekly\Domain\DayPrinciple;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;

interface DayPrincipleRepositoryContract
{

    public function save(DayPrinciple $dayPrinciple): void;
    public function update(DayId $dayId,DayPrinciple $dayPrinciple): void;
    public function list();
    public function find(DayId $dayId);
    public function delete(DayId $dayId);








}
