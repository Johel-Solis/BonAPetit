<?php
declare(strict_types=1);

namespace Src\Menu\Meat\Domain\Contracts;

use Src\Menu\Meat\Domain\Meat;
use Src\Menu\Meat\Domain\ValueObjects\MeatId;

interface MeatRepositoryContract 
{
	
    public function save(Meat $meat): void;
    public function update(MeatId $meatId,Meat $meat): void;
    public function list(); 
    public function find(MeatId $meatId); 
    public function delete(MeatId $meatId);

    
    

    
    

    
}
