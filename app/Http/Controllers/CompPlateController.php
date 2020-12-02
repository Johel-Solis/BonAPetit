<?php

namespace App\Http\Controllers;

use App\{Beverage,Meat,Principle,Soup};
use Illuminate\Http\Request;


use Src\Menu\Beverage\Infrastructure\{CreateBeverageController,DeleteBeverageController,ListBeverageController,FindBeverageController};


use Src\Menu\Meat\Infrastructure\{CreateMeatController,DeleteMeatController,ListMeatController,FindMeatController};


use Src\Menu\Principle\Infrastructure\{CreatePrincipleController,DeletePrincipleController,ListPrincipleController,FindPrincipleController};


use Src\Menu\Soup\Infrastructure\{CreateSoupController,DeleteSoupController,ListSoupController,FindSoupController};

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


        $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:60', 'photo'=>'required|image|mimes:jpg,jpeg,png'],[
            'name.required'=>'El campo Nombre es obligatorio',
            'name.regex'=>'El campo Nombre solo debe tener letras',
            'name.min'=>'El campo Nombre deber tener al menos un caracter',
            'name.max'=>'El campo Nombre no deber tener más de 60 caracteres',
            'photo.required'=> 'Debe cargar una foto',
            'photo.image'=>'El archivo debe ser una imagen',
            'photo.mimes'=>'El archivo debe tener extension jpg,jpeg o png',
        ]);
        if ($request->input('tipoComp')=='soup') {

            $this->validate($request,['name'=>'unique:soups,name'],
            ['name.unique'=>'El nombre digitado ya existe']);

            $createSoupController= new CreateSoupController();
            $createSoupController->__invoke($request);


            return redirect()->route("compPlate.index")
                    ->with('msj','Sopa registro exitoso');


        }elseif($request->input('tipoComp')=='meat')
        {
            $this->validate($request,['name'=>'unique:meats,name'],
            ['name.unique'=>'El nombre digitado ya existe']);
            $createMeatController= new CreateMeatController();
            $createMeatController->__invoke($request);


            return redirect()->route("compPlate.index")
                    ->with('msj','Carne registro exitoso');

        }elseif($request->input('tipoComp')=='beverage')
        {
            $this->validate($request,['name'=>'unique:beverages,name'],
            ['name.unique'=>'El nombre digitado ya existe']);
            $createBeverageController= new CreateBeverageController();
            $createBeverageController->__invoke($request);


            return redirect()->route("compPlate.index")
                    ->with('msj','Bebida registro exitoso');


        }else
        {
            $this->validate($request,['name'=>'unique:principles,name'],
            ['name.unique'=>'El nombre digitado ya existe']);
            $createPrincipleController= new CreatePrincipleController();
            $createPrincipleController->__invoke($request);


            return redirect()->route("compPlate.index")
                    ->with('msj','Principio registro exitoso');

        }
    }


}
