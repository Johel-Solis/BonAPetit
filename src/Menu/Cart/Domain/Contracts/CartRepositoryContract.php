<?php
declare(strict_types=1);

namespace Src\Menu\Cart\Domain\Contracts;

use Src\Menu\Cart\Domain\Cart;
use Src\Menu\Cart\Domain\ValueObjects\CartId;


interface CartRepositoryContract 
{
	
    public function save(Cart $cart);
    public function update(cartId $cartId,Cart $cart): void;
    public function list(); 
    public function find(CartId $cartId); 
    public function delete(CartId $CartId);

    
    

    
    

    
}