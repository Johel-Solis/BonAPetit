<?php

declare(strict_types=1);
namespace Src\Menu\weekly\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\weekly\Infrastructure\{CreateDayController,DeleteDayController};
use Src\Menu\weekly\Domain\Day;
use Src\Menu\weekly\Infrastructure\Repositories\EloquentDayRepository;

final class UpdateDayController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentDayRepository();
    }

    public function __invoke(int $id,Request $request)
    {
        $deleteDayController= new deleteDayController();
        $deleteDayController->__invoke($id);  

        $createDayController= new CreateDayController();
        $createDayController->__invoke($request);
     
        
    }
}