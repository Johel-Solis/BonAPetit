<?php

declare(strict_types=1);
namespace Src\Menu\Meat\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Meat\Application\UpdateMeatUseCase;
use Src\Menu\Meat\Domain\Meat;
use Src\Menu\Meat\Infrastructure\Repositories\EloquentMeatRepository;

final class UpdateMeatController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentMeatRepository();
    }

    public function __invoke(int $id,string $photoOld ,Request $request)
    {
        $updateMeatUseCase = new UpdateMeatUseCase($this->repository);
        $meatName              = $request->input('name');
        
        if ($request->file('photo')!= NULL) {
            $meatPhotoOld             = public_path().$photoOld;
            unlink($meatPhotoOld);
            $photo                  = $request->file('photo');
            $photoName              = time().'_'.$photo->getClientOriginalName();
            $meatPhoto             = public_path().'/MeatFotos';
            $photo->move($meatPhoto, $photoName);    
            $updateMeatUseCase->__invoke($id, $meatName,  '/MeatFotos/'.$photoName);

        }else
        {
        $updateMeatUseCase->__invoke($id,$meatName, $photoOld);
        
        }
        
    }
}