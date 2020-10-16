<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Plate\Application\CreatePlateUseCase;
use Src\Menu\Plate\Infrastructure\Repositories\EloquentPlateRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

final class CreatePlateController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPlateRepository();
    }

    public function __invoke(Request $request)
    {
        $plateName              = $request->input('name');
        $plateDescription       = $request->input('description');
        $platePrecio            = (int)$request->input('precio');
        $photo                  = $request->file('photo');
        $photoName              = time().'_'.$photo->getClientOriginalName();
        $platePhoto             = public_path().'/plateFotos';
        $photo->move($platePhoto, $photoName);

        
        
        $createPlateUseCase = new CreatePlateUseCase($this->repository);
        $createPlateUseCase->__invoke($plateName, $plateDescription, $platePrecio, '/plateFotos/'.$photoName);


    }
}
