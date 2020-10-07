<?php

namespace App\Http\Controllers;

use App\Plate;
use Illuminate\Http\Request;
use App\Http\Requests\PlateRequest;
use Src\Menu\Plate\Infrastructure\CreatePlateController;
use Src\Menu\Plate\Infrastructure\DeletePlateController;
use Src\Menu\Plate\Infrastructure\ListPlateController;

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
        
        $data =array();
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
    public function edit(Plate $plate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $deletePlateController= new deletePlateController();
        $deletePlateController->__invoke($plate->id(),$plate->photo);
        
        $data =array();
        return redirect()->route("plate.create")
                ->with('msj','Plato registro exitoso');

    }
}
