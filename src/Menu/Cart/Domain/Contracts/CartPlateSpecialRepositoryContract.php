<?php
declare(strict_types=1);

namespace Src\Menu\Cart\Domain\Contracts;

use Src\Menu\Cart\Domain\CartPlateSpecial;
use Src\Menu\Cart\Domain\ValueObjects\CartId;

interface CartPlateSpecialRepositoryContract
{

    public function save(CartPlateSpecial $carplate): void;
   
    public function delete(CartId $id);








}
