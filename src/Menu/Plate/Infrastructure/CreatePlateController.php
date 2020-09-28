<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Plate\Application\CreatePlateUseCase;
use Src\Menu\PLate\Infrastructure\Repositories\EloquentPLateRepository;
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
        $photoName              =$photo->getClientOriginalName();
        
        Storage::disk('imgPlate')->put($photoName,  $photo);
        $platePhoto =Storage::url($photoName);
        $createPlateUseCase = new CreatePlateUseCase($this->repository);
        $createPlateUseCase->__invoke($plateName, $plateDescription, $platePrecio, $platePhoto);


    }
}
