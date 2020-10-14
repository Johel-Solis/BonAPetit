<?php

declare(strict_types=1);
namespace Src\Menu\Soup\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Soup\Application\DeleteSoupUseCase;
use Src\Menu\Soup\Infrastructure\Repositories\EloquentSoupRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Src\Menu\Soup\Domain\ValueObjects\SoupPhoto;

final class DeleteSoupController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentSoupRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $deleteSoupUseCase = new DeleteSoupUseCase($this->repository);
        $deleteSoupUseCase->__invoke($id);
        
    }
}