<?php

declare(strict_types=1);
namespace Src\Menu\Soup\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Soup\Application\UpdateSoupUseCase;
use Src\Menu\Soup\Domain\Soup;
use Src\Menu\Soup\Infrastructure\Repositories\EloquentSoupRepository;

final class UpdateSoupController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentSoupRepository();
    }

    public function __invoke(int $id,string $photoOld ,Request $request)
    {
        $updateSoupUseCase = new UpdateSoupUseCase($this->repository);
        $soupName              = $request->input('name');
        if ($request->file('photo')!= NULL) {
            $soupPhotoOld             = public_path().$photoOld;
            unlink($soupPhotoOld);
            $photo                  = $request->file('photo');
            $photoName              = time().'_'.$photo->getClientOriginalName();
            $soupPhoto             = public_path().'/SoupFotos';
            $photo->move($soupPhoto, $photoName);    
            $updateSoupUseCase->__invoke($id, $soupName, '/SoupFotos/'.$photoName);

        }else
        {
        $updateSoupUseCase->__invoke($id,$soupName,$photoOld);
        
        }
        
    }
}