<?php

namespace App\Http\Controllers;

use App\{Beverage,Meat,Principle,Soup,Cart,PlateExecutive,PlateSpecial,Cart_PlateSpecial,Car_PlateExecutive,Plate};
use Src\Menu\Beverage\Infrastructure\{ListBeverageController,FindBeverageController};
use Src\Menu\Meat\Infrastructure\{ListMeatController,FindMeatController};
use Src\Menu\Principle\Infrastructure\{ListPrincipleController,FindPrincipleController};
use Src\Menu\Soup\Infrastructure\{ListSoupController,FindSoupController};
use Src\Menu\Plate\Infrastructure\{ListPlateController,FindPLateController};
use Src\Menu\PlateExecutive\Infrastructure\{CreatePlateExecutiveController,CreatePlateSpecialController};
use Src\Menu\Cart\Infrastructure\CreateCartController;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $listPlateController= new ListPlateController();
        $plates=$listPlateController->__invoke();

        return view('cart.create')->with(['plates'=>$plates,'beverages'=>$beverages,'meats'=>$meats,'soups'=>$soups,'principles'=> $principles]);
        return response()->view("cart/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,['total'=>'required'],['total.required'=>'carrito de Compras esta vacio']);
           $executive= Array();
           $special= Array();
           $principles  = $request->idprinciples;
            $meats       = $request->idmeats;
            $beverages   = $request->idbeverages;
            $soups       =$request->idsoups;
            $ExObsevations      =$request->ExObservations;
            $plateS =$request->idplates;
            $plaObsevations      =$request->plaObservations;
            $total=0;

           if($beverages!=null)
           {
            for($i=0; $i<count($beverages);++$i)
            {
                $createplateExecutive=new CreatePlateExecutiveController();
                $idExecutive=$createplateExecutive->__invoke(7000,'no hay',$soups[$i],$principles[$i],$meats[$i],$beverages[$i]);
                $total+=7000;

                
                $executive[]=$idExecutive;
            }


           }

           if(count($plateS)>0)
           {
            for($i=0; $i<count($plateS);++$i)
            {
                $findPlateController= new FindPlateController();
                $p=$findPlateController->__invoke($plateS[$i]); 
                $createplateSpecial=new CreatePlateSpecialController();
                $idSpecial=$createplateSpecial->__invoke($p->precio,"no hyas",$plateS[$i]);

                $total+=$p->precio;
                $special[]=$idSpecial;
            }


           }
           $createCartController= new CreateCartController();
           $createCartController->__invoke(date('Y-m-d'),$total,$executive,$special);


           return redirect()->route("cart.create")
                ->with('msj','compra  exitosa');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
