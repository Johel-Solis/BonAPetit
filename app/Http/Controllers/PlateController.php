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
        if ($plate->name==$request->input('name')) {

            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:20']);
        }else
        {
            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:20|unique:plates,name']);

        }
        if ($request->file('photo')!= NULL) {
            
            $this->validate($request,['description'=>'required|min:10|string',
            'precio'=>'required|integer|min:0','photo'=>'required|image|mimes:jpg,jpeg,png']);    
                
        }else
        {
            $this->validate($request,['description'=>'required|min:10|string',
            'precio'=>'required|integer|min:0',]);

            
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
