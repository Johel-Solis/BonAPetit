<?php

declare(strict_types=1);

namespace Src\Menu\Soup\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Soup\Application\CreateSoupUseCase;
use Src\Menu\Soup\Infrastructure\Repositories\EloquentSoupRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

final class CreateSoupController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentSoupRepository();
    }

    public function __invoke(Request $request)
    {
        $soupName              = $request->input('name');
        
        $createSoupUseCase = new CreateSoupUseCase($this->repository);
        $createSoupUseCase->__invoke($soupName);


    }
}
