<?php
declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Domain\Contracts;

use Src\Menu\PlateExecutive\Domain\PlateSpecial;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveId;

interface PlateSpecialRepositoryContract 
{
	
    public function save(PlateSpecial $platespecial);
    public function update(PlateExecutiveId $plateExId,PlateSpecial $plateSpecial): void;
    public function list(); 
    public function find(PlateExecutiveId $plateExecutiveId); 
    public function delete(PlateExecutiveId $plateExecutiveId);

    
    

    
    

    
}