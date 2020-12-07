<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\Cart\Domain\Contracts\CartRepositoryContract;
use Src\Menu\Cart\Domain\ValueObjects\CartId;
use Src\Menu\Cart\Domain\ValueObjects\CartTotalCost;
use Src\Menu\Cart\Domain\ValueObjects\CartDate;
use Src\Menu\Cart\Domain\Cart;



final class CreateCartUseCase
{
    private $repository;

    public function __construct(CartRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( string $cartDate,int $total,Array $plateEs,Array $PlateEX): Cart
    {
        $date  =new CartDate($cartDate);
        $totalCost  =new CartTotalCost($total);

        $cart = Cart::create( $totalCost,$date,$plateEs,$PlateEX);

        return $this->repository->save($cart);

    }
}
