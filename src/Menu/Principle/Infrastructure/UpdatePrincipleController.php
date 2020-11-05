<?php

declare(strict_types=1);
namespace Src\Menu\Principle\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\Principle\Application\UpdatePrincipleUseCase;
use Src\Menu\Principle\Domain\Principle;
use Src\Menu\Principle\Infrastructure\Repositories\EloquentPrincipleRepository;

final class UpdatePrincipleController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentPrincipleRepository();
    }

    public function __invoke(int $id,string $photoOld ,Request $request)
    {
        $updatePrincipleUseCase = new UpdatePrincipleUseCase($this->repository);
        $principleName              = $request->input('name');
        if ($request->file('photo')!= NULL) {
            $principlePhotoOld             = public_path().$photoOld;
            unlink($principlePhotoOld);
            $photo                  = $request->file('photo');
            $photoName              = time().'_'.$photo->getClientOriginalName();
            $principlePhoto             = public_path().'/PrincipleFotos';
            $photo->move($principlePhoto, $photoName);    
            $updatePrincipleUseCase->__invoke($id, $principleName, '/PrincipleFotos/'.$photoName);

        }else
        {
        $updatePrincipleUseCase->__invoke($id,$principleName, $photoOld);
        
        }
        
    }
}