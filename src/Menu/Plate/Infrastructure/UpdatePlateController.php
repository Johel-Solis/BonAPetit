<?php

declare(strict_types=1);
namespace Src\Menu\Plate\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Plate\Application\UpdatePlateUseCase;
use Src\Menu\Plate\Domain\Plate;
use Src\Menu\PLate\Infrastructure\Repositories\EloquentPLateRepository;

final class UpdatePlateController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPlateRepository();
    }

    public function __invoke(int $id,string $photoOld ,Request $request)
    {
        $updatePlateUseCase = new UpdatePlateUseCase($this->repository);
        $plateName              = $request->input('name');
        $plateDescription       = $request->input('description');
        $platePrecio            = (int)$request->input('precio');
        if ($request->file('photo')!= NULL) {
            $platePhotoOld             = public_path().$photoOld;
            unlink($platePhotoOld);
            $photo                  = $request->file('photo');
            $photoName              = time().'_'.$photo->getClientOriginalName();
            $platePhoto             = public_path().'/plateFotos';
            $photo->move($platePhoto, $photoName);    
            $updatePlateUseCase->__invoke($id, $plateName, $plateDescription, $platePrecio, '/plateFotos/'.$photoName);

        }else
        {
        $updatePlateUseCase->__invoke($id,$plateName, $plateDescription, $platePrecio, $photoOld);
        
        }
        
    }
}