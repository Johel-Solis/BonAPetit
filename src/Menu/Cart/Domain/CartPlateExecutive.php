<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Domain;

use ArrayObject;
use PhpParser\Node\Expr\Cast\Array_;
use Src\Menu\Cart\Domain\ValueObjects\CartId;

final class CartPlateExecutive
{
    private $id;
    private $cart;
    private $plateExecutives=array();



    public function __construct(
        CartId $cart,
        Array  $plateExecutives

    )
    {
        $this->cart  = $cart;
        $this->plateExecutives=$plateExecutives;
    }

    public function id(): CartId
    {
        return $this->id;
    }

    public function cart(): CartId
    {
        return $this->cart;
    }
    public function plateExecutives(): Array
    {
        return $this->plateExecutives;
    }
    public function setPlateExecutives(Array $plateExecutives) : void
    {
        $this->plateExecutives=$plateExecutives;
    }

    public function setId(CartId $id) : void
    {
        $this->id=$id;
    }


    public static function create(
        CartId $cart,
        Array $plateExecutives
    ): self
    {
        $cart = new self( $cart, $plateExecutives);

        return $cart;
    }
}
