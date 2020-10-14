<?php

declare(strict_types=1);

namespace Src\Menu\Principle\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Principle\Application\CreatePrincipleUseCase;
use Src\Menu\Principle\Infrastructure\Repositories\EloquentPrincipleRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

final class CreatePrincipleController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPrincipleRepository();
    }

    public function __invoke(Request $request)
    {
        $principleName              = $request->input('name');
        $createPrincipleUseCase = new CreatePrincipleUseCase($this->repository);
        $createPrincipleUseCase->__invoke($principleName);


    }
}
