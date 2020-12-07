<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Application;


use Src\Menu\Cart\Domain\Contracts\CartRepositoryContract;
use Src\Menu\Cart\Domain\ValueObjects\CartId;

final class DeleteCartUseCase
{
    private $repository;

    public function __construct(CartRepositoryContract $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(int $id)
    {
        $cartId = new CartId($id);

         return $this->repository->delete($cartId);
    }
}
