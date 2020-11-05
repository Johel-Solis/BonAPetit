<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Src\Menu\Soup\Infrastructure\CreateSoupController;
use Src\Menu\Soup\Infrastructure\DeleteSoupController;
use Src\Menu\Soup\Infrastructure\ListSoupController;
use Src\Menu\Soup\Infrastructure\FindSoupController;
use Src\Menu\Soup\Infrastructure\UpdateSoupController;


class SoupController extends Controller
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
        $findSoupController= new FindSoupController();
        $soup=$findSoupController->__invoke($id);
        return view('compPlate/edit')->with(['componet'=>$soup,'tipoComp'=>'soup']);
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
        $findSoupController= new FindSoupController();
        $soup=$findSoupController->__invoke($id);
        if ($soup->name==$request->input('name')) {

            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:60']);
        }else
        {
            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:60|unique:soups,name']);

        }
        if ($request->file('photo')!= NULL) {
            
            $this->validate($request,['photo'=>'required|image|mimes:jpg,jpeg,png']);    
                
        }
        $updateSoupController= new UpdateSoupController();
        $updateSoupController->__invoke($soup->id, $soup->photo, $request);
        
        return redirect()->route("compPlate.index")
        ->with('msj','Sopa modificacion exitosa');
        
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
        $deleteSoupController= new deleteSoupController();
        $deleteSoupController->__invoke($id);
        return redirect()->route("compPlate.index")
           ->with('msj','Sopa eliminacion exitosa');


    }
}
