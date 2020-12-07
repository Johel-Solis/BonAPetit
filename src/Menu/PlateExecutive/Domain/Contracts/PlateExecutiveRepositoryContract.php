<?php
declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Domain\Contracts;

use Src\Menu\PlateExecutive\Domain\PlateExecutive;
use Src\Menu\PlateExecutive\Domain\ValueObjects\PlateExecutiveId;

interface PlateExecutiveRepositoryContract 
{
	
    public function save(PlateExecutive $plateExecutive);
    public function update(PlateExecutiveId $plateExId,PlateExecutive $plateExecutive): void;
    public function list(); 
    public function find(PlateExecutiveId $plateExecutiveId); 
    public function delete(PlateExecutiveId $plateExecutiveId);

    
    

    
    

    
}