<?php

declare(strict_types=1);
namespace Src\Menu\Soup\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Soup\Application\FindSoupUseCase;
use Src\Menu\Soup\Domain\Soup;
use Src\Menu\Soup\Infrastructure\Repositories\EloquentSoupRepository;

final class FindSoupController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentSoupRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $findSoupUseCase = new FindSoupUseCase($this->repository);
        $soup=$findSoupUseCase->__invoke($id);
        return $soup;
        
    }
}