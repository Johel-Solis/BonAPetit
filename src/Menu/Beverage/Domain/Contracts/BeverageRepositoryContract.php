<?php
declare(strict_types=1);

namespace Src\Menu\Beverage\Domain\Contracts;

use Src\Menu\Beverage\Domain\Beverage;
use Src\Menu\Beverage\Domain\ValueObjects\BeverageId;

interface BeverageRepositoryContract 
{
	
    public function save(Beverage $beverage): void;
    public function update(BeverageId $beverageId,Beverage $beverage): void;
    public function list(); 
    public function find(BeverageId $beverageId); 
    public function delete(BeverageId $beverageId);

    
    

    
    

    
}
