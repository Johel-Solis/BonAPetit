<?php

namespace App\Http\Controllers;

use App\{Beverage,Meat,Principle,Soup,Day};
use App\{Beverage_day,Meat_day,Principle_day,Soup_day};
use Illuminate\Http\Request;


use Src\Menu\Beverage\Infrastructure\{ListBeverageController,FindBeverageController};
use Src\Menu\Meat\Infrastructure\{ListMeatController,FindMeatController};
use Src\Menu\Principle\Infrastructure\{ListPrincipleController,FindPrincipleController};
use Src\Menu\Soup\Infrastructure\{ListSoupController,FindSoupController};
use Src\Menu\weekly\Infrastructure\{CreateDayController,ListDayController,UpdateDayController,FindDayController,DeleteDayController};

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

        $this->validate($request,['date'=>'required|unique:days,day_week','idbeverages'=>'required','idprinciples'=>'required','idsoups'=>'required','idmeats'=>'required'],['date.required'=>'seleccion la fecha', 'date.unique'=>'La fecha ya se encuentra asignada',
            'idbeverages.required'=>'no se registraron bebidas','idprinciples.required'=>'no se registraron principios','idsoups.required'=>'no se registraron sopas','idmeats.required'=>'no se registraron carnes']);



            $createDayController= new CreateDayController();
           $createDayController->__invoke($request);


           return redirect()->route("day.index")
                ->with('msj','Exitoso registro exitoso');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\day 
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\day  
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $listBeverageController= new ListBeverageController();
        $beverages=$listBeverageController->__invoke();

        $listSoupController= new ListSoupController();
        $soups=$listSoupController->__invoke();

        $listMeatController= new ListMeatController();
        $meats=$listMeatController->__invoke();

        $listPrincipleController= new ListPrincipleController();
        $principles=$listPrincipleController->__invoke();
        
        $findDayController= new FindDayController();
        $day=$findDayController->__invoke($id);
        
        $day_soups=$day->soups()->get();
        $day_beverages=$day->beverages()->get();
        $day_principles=$day->principles()->get();
        $day_meats=$day->meats()->get();
        return view('day/edit')->with(['day'=>$day,'beverages'=>$beverages,'meats'=>$meats,'soups'=>$soups,'principles'=> $principles,'day_soups'=>$day_soups,'day_principles'=>$day_principles,'day_beverages'=>$day_beverages,'day_meats'=>$day_meats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\day  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request,['date'=>'required','idbeverages'=>'required','idprinciples'=>'required','idsoups'=>'required','idmeats'=>'required'],['date.required'=>'seleccion la fecha',
        'idbeverages.required'=>'no se registraron bebidas','idprinciples.required'=>'no se registraron principios','idsoups.required'=>'no se registraron sopas','idmeats.required'=>'no se registraron carnes']);


        $findDayController= new FindDayController();
        $day=$findDayController->__invoke($id); 

        if ($day->day_week!=$request->input('date')) {
            $this->validate($request,['date'=>'unique:days,day_week'],
            ['date.unique'=>'La fecha ya se encuentra asignada']);

        }
        
        $updateDayController= new UpdateDayController();
        $updateDayController->__invoke($day->id, $request);
        
        return redirect()->route("day.index")
        ->with('msj','day modificacion exitosa');
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\day  
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $deleteDayController= new deleteDayController();
        $deleteDayController->__invoke($id);
        
        return redirect()->route("day.index")
           ->with('msj','Dia eliminacion exitosa');

    }


}
