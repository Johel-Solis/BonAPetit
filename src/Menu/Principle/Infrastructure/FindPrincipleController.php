<?php

declare(strict_types=1);
namespace Src\Menu\Principle\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Principle\Application\FindPrincipleUseCase;
use Src\Menu\Principle\Domain\Principle;
use Src\Menu\Principle\Infrastructure\Repositories\EloquentPrincipleRepository;

final class FindPrincipleController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPrincipleRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $findPrincipleUseCase = new FindPrincipleUseCase($this->repository);
        $principle=$findPrincipleUseCase->__invoke($id);
        return $principle;
        
    }
}