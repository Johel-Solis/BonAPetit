<?php

declare(strict_types=1);
namespace Src\Menu\Plate\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Plate\Application\DeletePlateUseCase;
use Src\Menu\Plate\Infrastructure\Repositories\EloquentPlateRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Src\Menu\Plate\Domain\ValueObjects\PlatePhoto;

final class DeletePlateController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPlateRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $deletePlateUseCase = new DeletePlateUseCase($this->repository);
        $photo=$deletePlateUseCase->__invoke($id);
        $platePhoto             = public_path().$photo;
        unlink($platePhoto);
        
    }
}