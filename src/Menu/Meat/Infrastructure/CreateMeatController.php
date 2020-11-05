<?php

declare(strict_types=1);

namespace Src\Menu\Meat\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Meat\Application\CreateMeatUseCase;
use Src\Menu\Meat\Infrastructure\Repositories\EloquentMeatRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

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
        $photo                  = $request->file('photo');
        $photoName              = time().'_'.$photo->getClientOriginalName();
        $meatPhoto             = public_path().'/MeatFotos';
        $photo->move($meatPhoto, $photoName);
        $createMeatUseCase = new CreateMeatUseCase($this->repository);
        $createMeatUseCase->__invoke($meatName,'/MeatFotos/'.$photoName);


    }
}
