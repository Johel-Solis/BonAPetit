<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlateResource;
use Illuminate\Http\Request;

class CreatePlateController extends Controller
{
    
    private $createPlateController;

    public function __construct(\Src\Menu\Plate\Infrastructure\CreatePlateController $createPlateController)
    {
        $this->createPlateController = $createPlateController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->createPlateController->__invoke($request);

        
    }
}