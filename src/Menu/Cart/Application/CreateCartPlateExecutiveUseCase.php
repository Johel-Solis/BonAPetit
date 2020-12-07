<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Application;

use Illuminate\Support\Facades\Date;
use Src\Menu\Cart\Domain\Contracts\CartPlateExecutiveRepositoryContract;
use Src\Menu\Cart\Domain\CartPlateExecutive;
use Src\Menu\Cart\Domain\ValueObjects\CartId;



final class CreateCartPlateExecutiveUseCase
{
    private $repository;

    public function __construct(CartPlateExecutiveRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( CartId $cart, Array $plateExecutives): void
    {
        

        $cartplate = CartPlateExecutive::create( $cart,$plateExecutives);

        $this->repository->save($cartplate);
    }
}
