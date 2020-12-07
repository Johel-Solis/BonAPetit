<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Domain;

use ArrayObject;
use PhpParser\Node\Expr\Cast\Array_;
use Src\Menu\Cart\Domain\ValueObjects\CartId;

final class CartPlateSpecial
{
    private $id;
    private $cart;
    private $plateSpecials=array();



    public function __construct(
        CartId $cart,
        Array  $plateSpecials

    )
    {
        $this->cart  = $cart;
        $this->plateSpecials=$plateSpecials;
    }

    public function id(): CartId
    {
        return $this->id;
    }

    public function cart(): CartId
    {
        return $this->cart;
    }
    public function plateSpecials(): Array
    {
        return $this->plateSpecials;
    }
    public function setPlateSpecials(Array $plateSpecials) : void
    {
        $this->plateSpecials=$plateSpecials;
    }

    public function setId(CartId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        CartId $cart,
        Array $plateSpecials
    ): self
    {
        $cart = new self( $cart, $plateSpecials);

        return $cart;
    }
}
