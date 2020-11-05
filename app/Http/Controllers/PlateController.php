<?php

namespace App\Http\Controllers;

use App\Plate;
use Illuminate\Http\Request;
use App\Http\Requests\PlateRequest;
use Src\Menu\Plate\Infrastructure\CreatePlateController;
use Src\Menu\Plate\Infrastructure\DeletePlateController;
use Src\Menu\Plate\Infrastructure\ListPlateController;
use Src\Menu\Plate\Infrastructure\FindPlateController;
use Src\Menu\Plate\Infrastructure\UpdatePlateController;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPlateController= new ListPlateController();
        $plates=$listPlateController->__invoke();
        return view('plate.index')->with('plates', $plates);
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
        return response()->view("plate/create",$data,200);
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlateRequest $request)
    {

       $plate= new Plate($request->all());
        $createPlateController= new CreatePlateController();
        $createPlateController->__invoke($request);
        
        
        return redirect()->route("plate.index")
                ->with('msj','Plato registro exitoso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $findPlateController= new FindPlateController();
        $plate=$findPlateController->__invoke($id);
        return view('plate/edit')->with('plate', $plate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $findPlateController= new FindPlateController();
        $plate=$findPlateController->__invoke($id);
        $this->validate($request,[ 
            'name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:20',
            'description'=>'required|min:10|string',
            'precio'=>'required|integer|min:0',
        ],[
            'name.required'=>'El campo Nombre es obligatorio',
            'name.regex'=>'El campo Nombre solo debe tener letras',
            'name.min'=>'El campo Nombre deber tener al menos un caracter',
            'name.max'=>'El campo Nombre no deber tener más de 20 caracteres',
            'description.required'=>'El campo Descripción es obligatorio',
            'description.min'=>'El campo descripcion debe tener al menos 10 caracteres',
            'precio.required'=>'El campo precio es obligatorio',
            'precio.integer'=>'El campo precio solo debe contener numeros',
            'precio.min'=>'El precio no puede ser menor a $0',
        ]  );
        if ($plate->name!=$request->input('name')) {
            $this->validate($request,['name'=>'unique:plates,name'],
            ['name.unique'=>'El nombre digitado ya existe']);

        }
        if ($request->file('photo')!= NULL) {
            
        $this->validate($request,['photo'=>'required|image|mimes:jpg,jpeg,png'],
        ['photo.required'=> 'Debe cargar una foto',
        'photo.image'=>'El archivo debe ser una imagen',
        'photo.mimes'=>'El archivo debe tener extension jpg,jpeg o png']);            
        }
        $updatePlateController= new UpdatePlateController();
        $updatePlateController->__invoke($plate->id, $plate->photo, $request);
        
        return redirect()->route("plate.index")
        ->with('msj','Plato modificacion exitosa');
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $deletePlateController= new deletePlateController();
        $deletePlateController->__invoke($id);
        
        return redirect()->route("plate.index")
           ->with('msj','Plato eliminacion exitosa');

    }
}
