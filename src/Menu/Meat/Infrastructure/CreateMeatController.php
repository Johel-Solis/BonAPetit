<?php

declare(strict_types=1);

namespace Src\Menu\Meat\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Meat\Application\CreateMeatUseCase;
use Src\Menu\Meat\Infrastructure\Repositories\EloquentMeatRepository;


final class CreateMeatController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentMeatRepository();
    }

    public function __invoke(Request $request)
    {
        $meatName              = $request->input('name');
        $createMeatUseCase = new CreateMeatUseCase($this->repository);
        $createMeatUseCase->__invoke($meatName);


    }
}
