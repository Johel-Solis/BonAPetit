<?php

declare(strict_types=1);
namespace Src\Menu\weekly\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\weekly\Application\ListDayUseCase;
use Src\Menu\weekly\Infrastructure\Repositories\EloquentDayRepository;



final class ListDayController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentDayRepository();
    }

    public function __invoke()
    {
        
        
        $listDayUseCase = new ListDayUseCase($this->repository);
        return $listDayUseCase->__invoke();
        
    }
}