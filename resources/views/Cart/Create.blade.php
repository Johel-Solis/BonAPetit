<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Carrito De compras</title>
    <link rel="stylesheet" href="{{ asset('assets_cart/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi">
    <link rel="stylesheet" href="{{ asset('assets_cart/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_cart/css/MUSA_carousel-product-cart-slider-1.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_cart/css/MUSA_carousel-product-cart-slider.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_cart/css/navbar-shoppingcart-ecommerce.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_cart/css/Navigation-with-Button.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_cart/css/styles.css')}}">
</head>

<body style="background-image:url('{{ asset('assets/img/carrito.jpg') }}')";>
<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container" style="color: #F5F5DC;"><a class="navbar-brand" style="color: #F5F5DC;" href="#">Bon Apetit</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Semanario </a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="{{action('DayController@create')}}">Registrar</a><a class="dropdown-item" href="{{action('DayController@index')}}">Lista</a></div>
                        
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Plato Especial </a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="{{action('PlateController@create')}}">Registrar</a><a class="dropdown-item" href="{{action('PlateController@index')}}">Lista</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height: auto; ">
        <div class="container">
        @if(session('msj'))
                <div class="notification alert alert-success" role="alert"> {{ session('msj')}}</div>
                @endif
        <h2 style="color: #F5F5DC;">
                  Carrito de compras</h2>
            <div class="row">
                <div class="col-md-8"><div class="container">
    <div class="row"style="border-bottom: 2.4px solid rgb(39,43,48) ;">
        
            <div class="col-md-12"style="border-bottom: 2.4px solid rgb(39,43,48) ;">
                <h3 style="color: #F5F5DC;">
                    Platos Especiales</h3>
            </div>
           
        
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            
                <div class="item">
                    <div class="row">
                        @foreach($plates as $plate)
                            <div class="col-sm-4">
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{asset($plate->photo)}}" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-12">
                                                <h5>
                                                {{ $plate->name }}</h5>
                                                <h5 class="price-text-color">
                                                    ${{$plate->precio}}</h5>
                                            </div>
                                            
                                        </div>
                                        <div class="separator clear-left">
                                            
                                                <i class="fa fa-shopping-cart"></i><a onclick="aggSpecial({{ $plate->id }},'{{ $plate->name }}',{{ $plate->precio }})" class="hidden-sm">Add to cart</a>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div style="border-bottom:  2.4px solid rgb(39,43,48) ;">
                <h3 style="color: #F5F5DC;">
                    Menú del dia:   7000</h3>
            </div>
            <div >
                <p style="color: #F5F5DC;">*Arma tu Plato Ejecutivo, Selecionando una opción de cada componente</p>
                   
            </div>
    <div class="row"style="border: 2.4px solid rgb(39,43,48) ;">
        <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item " style="border-bottom:  2.4px solid rgb(39,43,48) ;">
                    <h3 class="text-center">¿Que carne prefieres? </h3>
                    <div class="row">
                    @foreach($meats ?? '' as $meat)
                            <div class="col-sm-4">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{asset($meat->photo)}}" class="img-responsive" alt="a" />
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="price col-md-6">
                                                    <h5 id ='meat{{ $meat->id }}'>
                                                    {{ $meat->name }}</h5>
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="separator clear-left">
                                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" name="mea" value="{{ $meat->id }}" required=""><label class="form-check-label" >Seleccionar</label></div>
                                                
                                            </div>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                          
                    </div>
                </div>
                <div class="item" style="border-bottom:  2.4px solid rgb(39,43,48) ;">
                    <h3 class="text-center">¿Que principio prefieres? </h3>
                    <div class="row">
                    @foreach($principles ?? '' as $principle)
                        <div class="col-sm-4">
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{asset($principle->photo)}}" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-6">
                                                <h5 id ='princ{{ $principle->id }}'>
                                                {{ $principle->name }}</h5>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="separator clear-left">
                                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2" name="princ" value="{{ $principle->id }}" required=""><label class="form-check-label">Seleccionar</label></div>
                                            
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
                    </div>
                </div>
                <div class="item " style="border-bottom:  2.4px solid rgb(39,43,48) ;">
                    <h3 class="text-center">¿Que Sopa prefieres? </h3>
                    <div class="row">
                        @foreach($soups ?? '' as $soup)
                        
                            <div class="col-sm-4">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{asset($soup->photo)}}" class="img-responsive" alt="a" />
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="price col-md-6">
                                                    <h5 id ='sou{{ $soup->id }}'>
                                                    {{ $soup->name }}</h5>
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="separator clear-left">
                                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-3" name="sou" value="{{ $soup->id }}" required=""><label clas="form-check-label" >Seleccionar</label></div>
                                                
                                            </div>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        
                    </div>
                </div>
                <div class="item " style="border-bottom:  2.4px solid rgb(39,43,48) ;">
                    <h3 class="text-center">¿Que Bebida prefieres? </h3>
                    <div class="row">
                    @foreach($beverages as $beverage)
                        
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{asset($beverage->photo)}}" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5 id ='bev{{ $beverage->id }}'> 
                                            {{ $beverage->name }}</h5>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="separator clear-left">
                                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-4" name="beve" value="{{ $beverage->id }}" required=""><label class="form-check-label" >Seleccionar</label></div>
                                        
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                       
                    </div>
                </div>

                <div class="item " style="border-bottom:  2.4px solid rgb(39,43,48) ;">
                    <h3 class="text-center">¿Algo que debamos tener en cuenta para tu pedido? </h3>
                    <input class="form-control" type="text" placeholder="Responde aquí..." name="obsEx" id= 'obsEx' minlength="1" maxlength="100">
                </div>
                <div class="item " >
                    
                        <label for="canti" style="color: #F5F5DC;"> <strong>  Cantidad&nbsp;</strong></label><input  type="number" id="cant" name="cant"  min=1 max=8 value=1 style="width: 40px">
                         <a
                        class="btn btn-primary text-center" onclick="aggExecutive()" style="text-align: center;">Agregar al carrito</a>
                    

                    
                    
                </div>

            </div>
        </div>
    </div>
</div>
</div>
                <div class="col-md-4" style="height: 500px;border-style: solid;">
                @if(count($errors)>0)
                    

		<ul>
			@foreach($errors->all() as $error)
			<div class="notification alert alert-danger" role="alert">
			
				<li>{{$error}}</li>
				</div>
			@endforeach
		</ul>
		
	@endif
                <form action="/cart" method="POST">
			        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <div class="text-center" style="border-bottom: 2.4px solid rgb(39,43,48) ;"><h1 style="color: #F5F5DC;"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Tu Pedido</h1></div>
                    <div class="table-responsive text-left" style="border-bottom-style: solid;">
                        <table class="table">
                            <thead style="border-bottom-style: solid;border-bottom-color: rgb(11,11,11);">
                                <tr>
                                    <th>Cantidad</th>
                                    <th>pedido</th>
                                    <th>Costo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody id="tablita">
                                
                                
                            </tbody>
                        </table>
                    </div><label style="font-family: 'Abril Fatface', cursive;width: 114px;">TOTAL</label><input class="bg-white border-white shadow-none" type="text" id ="total" name="total" readonly="" required=""  style="text-align: right;border-bottom-style: none;">
                    <button
                        class="btn btn-primary text-center" type="submit" style="text-align: center;">Realizar Pedido</button></div>

                        </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets_cart/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets_cart/js/carrito.js')}}"></script>
    <script src="{{ asset('assets_cart/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>