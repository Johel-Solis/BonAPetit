<?php

declare(strict_types=1);
namespace Src\Menu\Beverage\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Beverage\Application\UpdateBeverageUseCase;
use Src\Menu\Beverage\Domain\Beverage;
use Src\Menu\Beverage\Infrastructure\Repositories\EloquentBeverageRepository;

final class UpdateBeverageController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentBeverageRepository();
    }

    public function __invoke(int $id,string $photoOld ,Request $request)
    {
        $updateBeverageUseCase = new UpdateBeverageUseCase($this->repository);
        $beverageName              = $request->input('name');
        if ($request->file('photo')!= NULL) {
            $beveragePhotoOld             = public_path().$photoOld;
            unlink($beveragePhotoOld);
            $photo                  = $request->file('photo');
            $photoName              = time().'_'.$photo->getClientOriginalName();
            $beveragePhoto             = public_path().'/BeverageFotos';
            $photo->move($beveragePhoto, $photoName);    
            $updateBeverageUseCase->__invoke($id, $beverageName, '/BeverageFotos/'.$photoName);

        }else
        {
        $updateBeverageUseCase->__invoke($id,$beverageName, $photoOld);
        
        }
        
    }
}