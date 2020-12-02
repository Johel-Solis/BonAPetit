<?php

namespace App\Http\Controllers;

use App\{Beverage,Meat,Principle,Soup,Day};
use App\{Beverage_day,Meat_day,Principle_day,Soup_day};
use Illuminate\Http\Request;


use Src\Menu\Beverage\Infrastructure\{ListBeverageController,FindBeverageController};
use Src\Menu\Meat\Infrastructure\{ListMeatController,FindMeatController};
use Src\Menu\Principle\Infrastructure\{ListPrincipleController,FindPrincipleController};
use Src\Menu\Soup\Infrastructure\{ListSoupController,FindSoupController};
use Src\Menu\weekly\Infrastructure\{CreateDayController,ListDayController};

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listDayController= new ListDayController();
        $days=$listDayController->__invoke();

        return view('Day.index')->with('days',$days);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listBeverageController= new ListBeverageController();
        $beverages=$listBeverageController->__invoke();

        $listSoupController= new ListSoupController();
        $soups=$listSoupController->__invoke();

        $listMeatController= new ListMeatController();
        $meats=$listMeatController->__invoke();

        $listPrincipleController= new ListPrincipleController();
        $principles=$listPrincipleController->__invoke();

        return view('Day.create')->with(['beverages'=>$beverages,'meats'=>$meats,'soups'=>$soups,'principles'=> $principles]);
        return response()->view("Day/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request,['date'=>'required','idbeverages'=>'required','idprinciples'=>'required','idsoups'=>'required','idmeats'=>'required'],['date.required'=>'seleccion la fecha',
            'idbeverages.required'=>'no se registraron bebidas','idprinciples.required'=>'no se registraron principios','idsoups.required'=>'no se registraron sopas','idmeats.required'=>'no se registraron carnes']);



            $createDayController= new CreateDayController();
           $createDayController->__invoke($request);


           return redirect()->route("plate.index")
                ->with('msj','Exitoso registro exitoso');

    }


}
