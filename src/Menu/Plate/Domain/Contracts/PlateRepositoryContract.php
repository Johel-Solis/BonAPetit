<?php
declare(strict_types=1);

namespace src\Menu\Plate\Domain\Contracts;

use src\Menu\Plate\Domain\Plate;
use src\Menu\Plate\Domain\ValueObjects\PLateName;
use src\Menu\Plate\Domain\ValueObjects\PLateId;
use src\Menu\Plate\Domain\ValueObjects\PLateDescription;
use src\Menu\Plate\Domain\ValueObjects\PLatePrecio;

interface PlateRepositoryContract 
{
	

    

    public function save(Plate $plate): void;

    
}
?>