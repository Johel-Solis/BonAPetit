<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Carro de compra</title>
    <link rel="stylesheet" href="{{ asset('assets_CP/bootstrap/css/bootstrap.min.css?h=8061b9c170bb6df6f0534784658e64d1') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arbutus">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets_CP/css/styles.min.css?h=c90f948c9838df7700d9c6003c79ea92') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="page-top">
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">Bon Apetit</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Domicilios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Oferta del dia</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Plato ejecutivo</a></li>
                    <li class="nav-item"><a class="nav-link fa fa-shopping-cart" href="{{action('CarroController@checkout')}}">Carrito @include('cart.estado')</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Plato Especial </a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="{{action('PlateController@create')}}">Registrar</a><a class="dropdown-item" href="{{action('PlateController@index')}}">Lista</a></div>
                   	</li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper" style="background-image:url('assets/img/fondo_plato.jpg');">
    	

            <div id="content">
            	<div class= "table-responsive">
            		<table class="table">
            			<thead>
            				<th>CANTIDAD</th>
            				<th>PRODUCTO</th>
            				<th>PRECIO</th>
            				<th>IMAGEN</th>
            				<th>ELIMINAR</th>
            			</thead>
            			<tbody>
            				@foreach (Cart::getContent() as $item)
            				<tr>
            					<td>{{$item->quantity}}</td>
            					<td>{{$item->name}}</td>
            					<td>{{number_format($item->precio,2)}}</td>
            					<td>
            						<form action="{{route('carro.remover')}}" method="post">
            						@csrf
            						<input type="hidden" name="id" value="{{$item->name}}">
            						<button  class="btn btn-success pull-righ" type="submit"> Eliminar</button>
            						
            					</form>
            					</td>
            				</tr>
            				@endforeach
            				<tr>
            					<td colspan="1"></td>
            					<td>TOTAL</td>
            					<td>{{number_format(Cart::getSubtotal(),2)}}</td>

            				</tr>
            			</tbody>
            		</table>
            	</div>

            </div>
            <div class="col-sm-6">
            	<form action="{{route('carro.vaciar')}}" method="post">
            		@csrf
            		
            		<button  class="btn btn-success pull-righ" type="submit"> Vaciar Carro</button>
            						
            	</form>
            </div>

            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Bon Apetit © 2020</span></div>
                </div>
            </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    		<script src="{{ asset('assets_CP/js/script.min.js?h=823eb1733a0a81fa385a52d2e8e60900') }}"></script>
    
</body>

</html>


