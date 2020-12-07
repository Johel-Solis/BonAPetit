<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\Cart\Domain\Contracts\CartPlateSpecialRepositoryContract;
use Src\Menu\Cart\Domain\CartPlateSpecial;
use Src\Menu\Cart\Domain\ValueObjects\CartId;



final class CreateCartPlateSpecialUseCase
{
    private $repository;

    public function __construct(CartPlateSpecialRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( CartId $cart, Array $plateSpecials): void
    {
       

        $cartplate = CartPlateSpecial::create( $cart,$plateSpecials);

        $this->repository->save($cartplate);
    }
}
