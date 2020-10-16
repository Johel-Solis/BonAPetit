<?php

namespace App\Http\Controllers;

use App\Meat;
use Illuminate\Http\Request;

use Src\Menu\Beverage\Infrastructure\CreateBeverageController;
use Src\Menu\Beverage\Infrastructure\DeleteBeverageController;
use Src\Menu\Beverage\Infrastructure\ListBeverageController;
use Src\Menu\Beverage\Infrastructure\FindBeverageController;


use Src\Menu\Meat\Infrastructure\CreateMeatController;
use Src\Menu\Meat\Infrastructure\DeleteMeatController;
use Src\Menu\Meat\Infrastructure\ListMeatController;
use Src\Menu\Meat\Infrastructure\FindMeatController;

use Src\Menu\Principle\Infrastructure\CreatePrincipleController;
use Src\Menu\Principle\Infrastructure\DeletePrincipleController;
use Src\Menu\Principle\Infrastructure\ListPrincipleController;
use Src\Menu\Principle\Infrastructure\FindPrincipleController;

use Src\Menu\Soup\Infrastructure\CreateSoupController;
use Src\Menu\Soup\Infrastructure\DeleteSoupController;
use Src\Menu\Soup\Infrastructure\ListSoupController;
use Src\Menu\Soup\Infrastructure\FindSoupController;


class CompPlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listBeverageController= new ListBeverageController();
        $beverages=$listBeverageController->__invoke();

        $listSoupController= new ListSoupController();
        $soups=$listSoupController->__invoke();

        $listMeatController= new ListMeatController();
        $meats=$listMeatController->__invoke();

        $listPrincipleController= new ListPrincipleController();
        $principles=$listPrincipleController->__invoke();

        return view('compPlate.index')->with(['beverages'=>$beverages,'meats'=>$meats,'soups'=>$soups,'principles'=> $principles]);
        //return response()->view("compPlate/index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data =array();
        return response()->view("compPlate/create",$data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meat= new Meat($request->all());
        
        if ($request->input('tipoComp')=='soup') {
            $createSoupController= new CreateSoupController();
            $createSoupController->__invoke($request);
            
            
            return redirect()->route("compPlate.index")
                    ->with('msj','Sopa registro exitoso');

            
        }elseif($request->input('tipoComp')=='meat') 
        {
            $createMeatController= new CreateMeatController();
            $createMeatController->__invoke($request);
            
            
            return redirect()->route("compPlate.index")
                    ->with('msj','Carne registro exitoso');

        }elseif($request->input('tipoComp')=='beverage') 
        {
            
            $createBeverageController= new CreateBeverageController();
            $createBeverageController->__invoke($request);
            
            
            return redirect()->route("compPlate.index")
                    ->with('msj','Bebida registro exitoso');
    

        }else
        {
            $createPrincipleController= new CreatePrincipleController();
            $createPrincipleController->__invoke($request);
            
            
            return redirect()->route("compPlate.index")
                    ->with('msj','Principio registro exitoso');

        }
    }

    
}
