<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ListaPlatos</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Footer-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-with-Search.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">


</head>

<body style="background-image:url('assets/img/fondo_plato.jpg');">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="#">Bon Apetit</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Domicilios</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{action('PlateController@create')}}">Registrar Plato Especial</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{action('CompPlateController@index')}}">Componente Plato Ejecutivo</a></li>
                </ul>
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form><a class="btn btn-light action-button" role="button" href="#" style="background: rgb(230,208,13);font-size: 17px;">Iniciar Sesión</a></div>
            <div></div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
        
        
            <div class="col-md-12">
                <h2 style="text-align: center; font-weight: bold; margin-top: 30px;">LISTA DE PLATOS ESPECIALES</h2>
                @if(session('msj'))
                <div class="notification alert alert-success" role="alert"> {{ session('msj')}}</div>
                @endif
                <div class="table-responsive">

                
                    <table id="mytable" class="table table-bordred table-striped "style="background-color: white">
                   
                        <thead>
                   
                            
                            
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Foto</th>

                            <th><em class="fa fa-cog"></em> Acción</th>
                          
                        </thead>
                        <tbody>
                                @foreach($plates as $plate)
                            <tr>
                            
                                <td>{{ $plate->name }}</td>
                                <td>{{ $plate->description }}</td>
                                <td>${{$plate->precio}}</td>
                                <td><img style="border: ridge; width: 250px; height: auto;" src="{{asset($plate->photo)}}"></td>
                                <td>
                                   <a href="{{action('PlateController@edit', $plate->id)}}" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                    <a href="{{ url('plate/destroy',$plate->id) }}" onclick="return confirm('¿Esta seguro?')"class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                </td>
                               
                            </tr>
                            @endforeach
    

                            
                        </tbody>
                    </table>


                    <nav aria-label="Page navigation example">
                          <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                     <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                          </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-clean"  style="position: relative; width: 100%; bottom: 0px;">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Registrar menú</a></li>
                            <li><a href="#">Pedir domicilios</a></li>
                            <li><a href="#">Mensajeria</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Acerca de nosotros</h3>
                        <ul>
                            <li><a href="#">Compañia</a></li>
                            <li><a href="#">Equipo</a></li>
                            <li><a href="#">Conocenos</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">Bon Apetit © 2020</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>