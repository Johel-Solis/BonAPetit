<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\Menu\Plate\Application\CreatePlateUseCase;
use Src\Menu\Plate\Application\GetPLateByCriteriaUseCase;
use Src\Menu\PLate\Infrastructure\Repositories\EloquentPLateRepository;

final class CreatePlateController
{
    private $repository;

    public function __construct(EloquentPlateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $plateName              = $request->input('name');
        $plateDescription       = $request->input('description');
        $platePrecio            = $request->input('precio');
        

        $createPlateUseCase = new CreatePlateUseCase($this->repository);
        $createPlateUseCase->__invoke(
            $plateName,
            $plateDescription,
            $platePrecio
        );


    }
}
?>