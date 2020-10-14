<?php

declare(strict_types=1);
namespace Src\Menu\Soup\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Soup\Application\ListSoupUseCase;
use Src\Menu\Soup\Infrastructure\Repositories\EloquentSoupRepository;



final class ListSoupController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentSoupRepository();
    }

    public function __invoke()
    {
        
        
        $listSoupUseCase = new ListSoupUseCase($this->repository);
        return $listSoupUseCase->__invoke();
        
    }
}