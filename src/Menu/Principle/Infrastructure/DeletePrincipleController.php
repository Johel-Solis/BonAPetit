<?php

declare(strict_types=1);
namespace Src\Menu\Principle\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Principle\Application\DeletePrincipleUseCase;
use Src\Menu\Principle\Infrastructure\Repositories\EloquentPrincipleRepository;


final class DeletePrincipleController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPrincipleRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $deletePrincipleUseCase = new DeletePrincipleUseCase($this->repository);
        $deletePrincipleUseCase->__invoke($id);
        
        
    }
}