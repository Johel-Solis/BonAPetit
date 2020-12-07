<?php
declare(strict_types=1);

namespace Src\Menu\Cart\Domain\Contracts;

use Src\Menu\Cart\Domain\CartPlateExecutive;
use Src\Menu\Cart\Domain\ValueObjects\CartId;

interface CartPlateExecutiveRepositoryContract
{

    public function save(CartPlateExecutive $cartPlate): void;
   
   
    public function delete(CartId $id);








}
