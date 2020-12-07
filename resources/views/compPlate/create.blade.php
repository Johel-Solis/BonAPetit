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
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body id="page-top">
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">Bon Apetit</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
                    <li class="nav-item"><a class="nav-link" href="{{action('CompPlateController@index')}}"><i class="fas fa-table"></i><span>Lista de Componentes</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{action('CompPlateController@create')}}"><i class="fas fa-user-circle"></i><span>Registrar Componente</span></a></li>
                    
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper" style="background-image:url('{{ asset('assets_CP/img/fondo_plato.jpg') }}')";>
            <div id="content">
                <div class="container-fluid">
                    <div class="row text-center mb-3">
                        <div class="col" style="margin-top: 50px;">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3" style="text-align: center;margin-top: 3px;color: rgb(1,1,1);">
                                    <p class="m-0 font-weight-bold" style="color: rgb(14,13,13);font-family: Nunito, sans-serif;font-size: 20px;">Registrar componente del plato ejecutivo</p>
                                </div>
                                <div class="card-body text-center">

                                        <form action="/compPlate" method="POST" class="text-left" enctype="multipart/form-data">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="name"><strong>Nombre&nbsp;</strong><br></label><input class="form-control" type="text" placeholder="nombre del componente" name="name" required="" minlength="1" maxlength="60"></div>
                                                <div class="form-group"><label for="photo"><strong>Foto&nbsp;</strong><br></label><input  type="file" style="width: 270px;height: 45px;"  name="photo" id="photo"></div>
                                            </div>
                                            <div class="col">
                                                
                                                <div id="imagPrev">
                                                </div>
                                                @if(session('msj'))
                                                <div class="notification alert alert-success" role="alert"> {{ session('msj')}}</div>
                                                @endif
                                            @if(count($errors)>0)
                    

                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                    <div class="notification alert alert-danger" role="alert">
                                                    
                                                        <li>{{$error}}</li>
                                                        </div>
                                                    @endforeach
                                                </ul>
                                                
                                            @endif
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="typecomponent"><strong>Tipo de Componente</strong><br></label>
                                                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" name="tipoComp" value="principle" required=""><label class="form-check-label" for="formCheck-4">Principios</label></div>
                                                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" name="tipoComp" value="meat" required=""><label class="form-check-label" for="formCheck-3">Carnes</label></div>
                                                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" name="tipoComp" value="soup" required=""><label class="form-check-label" for="formCheck-2">Sopas</label></div>
                                                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" name="tipoComp" value="beverage" required=""><label class="form-check-label" for="formCheck-1">Bebidas</label></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="color: rgb(15,15,16);"><button class="btn btn-primary btn-sm" type="submit" style="background: rgb(108,63,63);">Guardar</button></div>
                                    </form>
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
    <script >
    (function(){
        function filePreview(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#imagPrev').html("<img src='"+e.target.result+"' id='imgPre'/>");
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#photo').change(function(){
            filePreview(this);

        });

    })();
    </script>
</body>

</html>