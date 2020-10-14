<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Src\Menu\Beverage\Infrastructure\DeleteBeverageController;
use Src\Menu\Beverage\Infrastructure\ListBeverageController;
use Src\Menu\Beverage\Infrastructure\FindBeverageController;


use Src\Menu\Meat\Infrastructure\DeleteMeatController;
use Src\Menu\Meat\Infrastructure\ListMeatController;
use Src\Menu\Meat\Infrastructure\FindMeatController;


use Src\Menu\Principle\Infrastructure\DeletePrincipleController;
use Src\Menu\Principle\Infrastructure\ListPrincipleController;
use Src\Menu\Principle\Infrastructure\FindPrincipleController;


use Src\Menu\Soup\Infrastructure\DeleteSoupController;
use Src\Menu\Soup\Infrastructure\ListSoupController;
use Src\Menu\Soup\Infrastructure\FindSoupController;


class ComponentesMenuController extends Controller
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

        return view('compMenu.index')->with('beverages','meat','soups','principles', $beverages,$meats,$soups,$principles);
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
        return response()->view(".",$data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    
}
