<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Src\Menu\Beverage\Infrastructure\DeleteBeverageController;
use Src\Menu\Beverage\Infrastructure\FindBeverageController;
use Src\Menu\Beverage\Infrastructure\UpdateBeverageController;


class BeverageController extends Controller
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
        //
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
    public function edit(int $id)
    {
        $findBeverageController= new FindBeverageController();
        $beverage=$findBeverageController->__invoke($id);
        return view('compPlate/edit')->with(['componet'=>$beverage,'tipoComp'=>'beverage']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $findBeverageController= new FindBeverageController();
        $beverage=$findBeverageController->__invoke($id);
        if ($beverage->name==$request->input('name')) {

            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:60']);
        }else
        {
            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:60|unique:beverages,name']);

        }
        if ($request->file('photo')!= NULL) {
            
            $this->validate($request,['photo'=>'required|image|mimes:jpg,jpeg,png']);    
                
        }
        $updateBeverageController= new UpdateBeverageController();
        $updateBeverageController->__invoke($beverage->id, $beverage->photo, $request);
        
        return redirect()->route("compPlate.index")
        ->with('msj','bebida modificacion exitosa');
        
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
        $deleteBeverageController= new deleteBeverageController();
        $deleteBeverageController->__invoke($id);
        
        return redirect()->route("compPlate.index")
           ->with('msj','Bebida eliminacion exitosa');

    }
}
