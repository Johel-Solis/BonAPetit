<?php
declare(strict_types=1);

namespace Src\Menu\Plate\Domain\Contracts;

use Src\Menu\Plate\Domain\Plate;
use Src\Menu\Plate\Domain\ValueObjects\PlateId;

interface PlateRepositoryContract 
{
	
    public function save(Plate $plate): void;
    public function update(PlateId $plateId,Plate $plate): void;
    public function list(); 
    public function delete(PlateId $plateId): void;
    
    

    
    

    
}
