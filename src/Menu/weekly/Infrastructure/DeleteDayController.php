<?php

declare(strict_types=1);
namespace Src\Menu\weekly\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\weekly\Application\DeleteDayUseCase;
use Src\Menu\weekly\Infrastructure\Repositories\EloquentDayRepository;
use Src\Menu\weekly\Domain\ValueObjects\Day;

final class DeleteDayController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EloquentDayRepository();
    }

    public function __invoke(int $id)
    {
        
      
        $deleteDayUseCase = new DeleteDayUseCase($this->repository);
        $deleteDayUseCase->__invoke($id);
        
    }
}