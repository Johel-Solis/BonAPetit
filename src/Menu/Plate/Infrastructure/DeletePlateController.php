<?php

declare(strict_types=1);
namespace Src\Menu\Plate\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Plate\Application\CreatePlateUseCase;
use Src\Menu\PLate\Infrastructure\Repositories\EloquentPLateRepository;
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

    public function __invoke(int $PlateId,string $photo)
    {
        
        //Storage::delete('file.jpg');
        $deleteUseCase = new DeleteUserUseCase($this->repository);
        $deleteUserUseCase->__invoke($userId);
        Storage::disk('imgPlate')->delete($photo);
    }
}