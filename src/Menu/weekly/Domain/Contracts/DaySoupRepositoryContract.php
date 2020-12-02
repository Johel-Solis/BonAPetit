<?php
declare(strict_types=1);

namespace Src\Menu\Weekly\Domain\Contracts;

use Src\Menu\Weekly\Domain\DaySoup;
use Src\Menu\Weekly\Domain\ValueObjects\DayId;

interface DaySoupRepositoryContract
{

    public function save(DaySoup $daySoup): void;
    public function update(DayId $dayId,DaySoup $daySoup): void;
    public function list();
    public function find(DayId $dayId);
    public function delete(DayId $dayId);








}
