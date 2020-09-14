<?php
declare(strict_types=1);

namespace Src\Menu\Plate\Domain\Contracts;

use Src\Menu\Plate\Domain\Plate;

interface PlateRepositoryContract 
{
	
    public function save(Plate $plate): void;

    
}
