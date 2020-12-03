<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Componentes plato</title>
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
                    <li class="nav-item"><a class="nav-link" href="{{action('CarroController@checkout')}}">Carrito @include('cart.estado')</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Plato Especial </a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="{{action('PlateController@create')}}">Registrar</a><a class="dropdown-item" href="{{action('PlateController@index')}}">Lista</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End: Navigation Clean -->
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: #6c3f3f;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>navegación</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="{{action('CompPlateController@index')}}"><i class="fas fa-table"></i><span>Lista de Componentes</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{action('CompPlateController@create')}}"><i class="fas fa-user-circle"></i><span>Registrar Componente</span></a></li>
                    
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper" style="background-image:url('assets/img/fondo_plato.jpg');">

            <div id="content">
            @if(session('msj'))
                <div class="notification alert alert-success" role="alert"> {{ session('msj')}}</div>
                @endif
                <div class="container-fluid">
                    <div class="card shadow mb-3" style="margin-top: 20px;">
                        <div class="card-header py-3" style="text-align: center;color: rgb(1,1,1);height: 139px;">
                            <h3 class="text-dark mb-0" style="text-align: center;margin-top: 33px;">Componentes del Plato ejecutivo</h3>
                        </div>
                        <div class="card-body text-center">
                            <div class="row" style="margin-top: 15px;height: 400px;">
                                <div class="col-md-6 col-xl-3 mb-4" style="margin-top: -1px;height: auto;border: 3px solid rgb(146,148,163) ;">
                                    <div class="table-responsive" style="font-size: 15px;height: auto;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Sopa</th>
                                                    <th><em class="fa fa-cog"></em> Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($soups)!=0)
                                                    @foreach($soups ?? '' as $soup)
                                                        <tr>
                                                            <td>{{ $soup->name }}</td>
                                                            
                                                            <td>
                                                                <a href="{{action('SoupController@edit', $soup->id)}}" ><em class="fa fa-pencil"></em></a>
                                                            <a href="{{ action('SoupController@destroy',$soup->id) }}" onclick="return confirm('¿Esta seguro?')"><em class="fa fa-trash"></em></a></td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                
                                                @else
                                                    <tr>
                                                        <th><p>no hay sopas registradas</p></th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-4" style="margin-top: -1px;height: auto;border: 3px solid rgb(146,148,163) ;">
                                    <div class="table-responsive" style="font-size: 15px;height: auto;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Principio</th>
                                                    <th><em class="fa fa-cog"></em> Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($principles) !=0)
                                                    @foreach($principles ?? '' as $principle)
                                                        <tr>
                                                            <td>{{ $principle->name }}</td>
                                                            <td>
                                                            <a href="{{action('PrincipleController@edit', $principle->id)}}" ><em class="fa fa-pencil"></em></a>
                                                            <a href="{{ action('PrincipleController@destroy',$principle->id) }}" onclick="return confirm('¿Esta seguro?')"><em class="fa fa-trash"></em></a></td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                
                                                @else
                                                    <tr>
                                                        <th><p>no hay Principios registrados</p></th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-4" style="margin-top: -1px;height: auto;border-style: solid;border-color: rgb(146,148,163);">
                                    <div class="table-responsive" style="font-size: 15px;height: auto;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Carnes</th>
                                                    <th><em class="fa fa-cog"></em> Acción</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($meats)!=0)
                                                    @foreach($meats ?? '' as $meat)
                                                        <tr>
                                                            <td>{{ $meat->name }}</td>
                                                            <td>
                                                            <a href="{{action('MeatController@edit', $meat->id)}}" ><em class="fa fa-pencil"></em></a>
                                                            <a href="{{ action('MeatController@destroy',$meat->id) }}" onclick="return confirm('¿Esta seguro?')"><em class="fa fa-trash"></em></a></td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                
                                                @else
                                                    <tr>
                                                        <th><p>no hay carnes registradas</p></th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-4" style="margin-top: -1px;height: auto;border-style: solid;border-color: rgb(146,148,163);">
                                    <div class="table-responsive" style="font-size: 15px;height: auto;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Bebidas</th>
                                                    <th><em class="fa fa-cog"></em> Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if (count($beverages)!=0)
                                                    @foreach($beverages as $beverage)
                                                        <tr>
                                                            <td>{{ $beverage->name }}</td>
                                                            <td>
                                                            <a href="{{action('BeverageController@edit', $beverage->id)}}" ><em class="fa fa-pencil"></em></a>
                                                            <a href="{{ action('BeverageController@destroy',$beverage->id) }}" onclick="return confirm('¿Esta seguro?')"><em class="fa fa-trash"></em></a></td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                
                                            @else
                                                    <tr>
                                                        <th><p>no hay bebidas registradas</p></th>
                                                    </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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