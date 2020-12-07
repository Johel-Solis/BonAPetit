<?php

declare(strict_types=1);
namespace Src\Menu\weekly\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\weekly\Application\FindDayUseCase;
use Src\Menu\weekly\Infrastructure\Repositories\EloquentDayRepository;

final class FindDayController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentDayRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $findDayUseCase = new FindDayUseCase($this->repository);
        $day=$findDayUseCase->__invoke($id);
        return $day;
        
    }
}