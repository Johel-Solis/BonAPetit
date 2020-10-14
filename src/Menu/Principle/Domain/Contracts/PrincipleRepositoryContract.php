<?php
declare(strict_types=1);

namespace Src\Menu\Principle\Domain\Contracts;

use Src\Menu\Principle\Domain\Principle;
use Src\Menu\Principle\Domain\ValueObjects\PrincipleId;

interface PrincipleRepositoryContract 
{
	
    public function save(Principle $principle): void;
    public function list(); 
    public function find(PrincipleId $principleId); 
    public function delete(PrincipleId $principleId);

    
    

    
    

    
}
