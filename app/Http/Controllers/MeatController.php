<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Menu\Meat\Infrastructure\DeleteMeatController;
use Src\Menu\Meat\Infrastructure\ListMeatController;
use Src\Menu\Meat\Infrastructure\FindMeatController;
use Src\Menu\Meat\Infrastructure\UpdateMeatController;

class MeatController extends Controller
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
        $findMeatController= new FindMeatController();
        $meat=$findMeatController->__invoke($id);
        return view('compPlate/edit')->with(['componet'=>$meat,'tipoComp'=>'meat']);
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
        $findMeatController= new FindMeatController();
        $meat=$findMeatController->__invoke($id);
        if ($meat->name==$request->input('name')) {

            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:60']);
        }else
        {
            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:60|unique:meats,name']);

        }
        if ($request->file('photo')!= NULL) {
            
            $this->validate($request,['photo'=>'required|image|mimes:jpg,jpeg,png']);    
                
        }
        $updateMeatController= new UpdateMeatController();
        $updateMeatController->__invoke($meat->id, $meat->photo, $request);
        
        return redirect()->route("compPlate.index")
        ->with('msj','carne modificacion exitosa');
        
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
        $deleteMeatController= new deleteMeatController();
        $deleteMeatController->__invoke($id);
        
        return redirect()->route("compPlate.index")
           ->with('msj','Carne eliminacion exitosa');

    }
}
