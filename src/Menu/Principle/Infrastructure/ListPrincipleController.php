<?php

declare(strict_types=1);
namespace Src\Menu\Principle\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Principle\Application\ListPrincipleUseCase;
use Src\Menu\Principle\Infrastructure\Repositories\EloquentPrincipleRepository;



final class ListPrincipleController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPrincipleRepository();
    }

    public function __invoke()
    {
        
        
        $listPrincipleUseCase = new ListPrincipleUseCase($this->repository);
        return $listPrincipleUseCase->__invoke();
        
    }
}