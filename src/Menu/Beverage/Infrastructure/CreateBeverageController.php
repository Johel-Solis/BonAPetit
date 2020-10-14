<?php

declare(strict_types=1);

namespace Src\Menu\Beverage\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Beverage\Application\CreateBeverageUseCase;
use Src\Menu\Beverage\Infrastructure\Repositories\EloquentBeverageRepository;


final class CreateBeverageController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentBeverageRepository();
    }

    public function __invoke(Request $request)
    {
        $beverageName        = $request->input('name');
        
        $createBeverageUseCase = new CreateBeverageUseCase($this->repository);
        $createBeverageUseCase->__invoke($beverageName);


    }
}
