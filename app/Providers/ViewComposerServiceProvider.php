<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
	public function register()
	{

	}
	public function boot()
	{
		View::composer('cart.estado',function($view){
			$view->with('carritoCount',Cart::getContent()->count());
		});

		View::composer('cart.resumen',function($view){
			$view->with('carritoCount',Cart::getContent()->count());
		});
	}
}