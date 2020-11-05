<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Menu\Principle\Infrastructure\DeletePrincipleController;
use Src\Menu\Principle\Infrastructure\FindPrincipleController;
use Src\Menu\Principle\Infrastructure\UpdatePrincipleController;



class PrincipleController extends Controller
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
        $findPrincipleController= new FindPrincipleController();
        $principle=$findPrincipleController->__invoke($id);
        return view('compPlate/edit')->with(['componet'=>$principle,'tipoComp'=>'principle']);
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
        $findPrincipleController= new FindPrincipleController();
        $principle=$findPrincipleController->__invoke($id);
        if ($principle->name==$request->input('name')) {

            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:60']);
        }else
        {
            $this->validate($request,['name'=>'required|regex:/^[\pL\s\-]+$/u|min:1|max:60|unique:principles,name']);

        }
        if ($request->file('photo')!= NULL) {
            
            $this->validate($request,['photo'=>'required|image|mimes:jpg,jpeg,png']);    
                
        }
        $updatePrincipleController= new UpdatePrincipleController();
        $updatePrincipleController->__invoke($principle->id, $principle->photo, $request);
        
        return redirect()->route("compPlate.index")
        ->with('msj','Principio modificacion exitosa');
        
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
        $deletePrincipleController= new deletePrincipleController();
        $deletePrincipleController->__invoke($id);
        
        return redirect()->route("compPlate.index")
           ->with('msj','Principio eliminacion exitosa');
  //
    }
}
