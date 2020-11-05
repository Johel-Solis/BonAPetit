<?php
declare(strict_types=1);

namespace Src\Menu\Soup\Domain\Contracts;

use Src\Menu\Soup\Domain\Soup;
use Src\Menu\Soup\Domain\ValueObjects\SoupId;

interface SoupRepositoryContract 
{
	
    public function save(Soup $soup): void;
    public function update(SoupId $soupId,Soup $soup): void;
    public function list(); 
    public function find(SoupId $soupId); 
    public function delete(SoupId $soupId);

    
    

    
    

    
}
