<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Plate;

class CarroController extends Controller
{
    public function agregar(Request $request)
    {
    	$plate= Plate::find($request->name);
    	Cart::add(
    		$plate->name,
    		
    		$plate->precio,
    		
    		$request->quantity
    		
    	);
    	return back()->with('success',"$plate->name Se ha agregado al carrito de compra");
    }

    public function checkout(){
    	return view('cart.checkout');
    }
    public function delete(Request $request){
    	$plate= Plate::find($request->name);
    	Cart::remove(['name'=>$request->name]);
    	return view('cart.checkout');
    }
    public function destroy(){
    	
    	Cart::clear();
    	return back()->with('success', "| carro de compra vacio");
    }
}