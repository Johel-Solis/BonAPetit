<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RegistrarMenu</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Footer-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-with-Search.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="#">Bon Apetit</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Domicilios</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{action('PlateController@index')}}">Lista Plato Especial</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{action('CompPlateController@index')}}">Componente Plato Ejecutivo</a></li>
                </ul>
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form><a class="btn btn-light action-button" role="button" href="#" style="background: rgb(230,208,13);font-size: 17px;">Iniciar Sesión</a></div>
            <div></div>
        </div>

        
    </nav>
    

    <div class="login-clean row justify-content-center" style="background-image:url('{{ asset('assets/img/fondo_plato.jpg') }}')";>
    <div>
        
    </div>
    
     
        <form action="/plate" method="POST" class="justify-content-center" style="margin: 56px;width: 440px;height:auto;padding: 29px;" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
            <h3 style="margin-bottom: 0px">Registrar Plato Especial</h3>
            <div class="illustration" style="width: 121px; height:121px; margin-top: 0px; ">
                <span class="iconify" data-icon="openmoji:fork-and-knife-with-plate" data-inline="false"style="margin-top: 0px; color: rgb(247,204,52);border-color: rgb(230,208,13);"></span></div>
            <div class="form-group">
               

                <input class="form-control" type="text" name="name" placeholder="Nombre" >
                @error('name')
                    <div class="aler alert-danger">
                        El campo Nombre es obligatorio
                    </div>
                @enderror
                
                <input class="form-control" type="text" name="description" placeholder="Descripcion">
                @error('description')
                    <div class="aler alert-danger">
                        El campo Descripcion es obligatorio
                    </div>
                @enderror
                <input class="form-control" type="number" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" name="precio" placeholder="Precio">
                @error('precio')
                <div class="aler alert-danger">
                    El campo Precio es obligatorio
                </div>
                @enderror
                
                 <input type="file" style="width: 270px;height: 45px;"  name="photo" id="photo">
                @error('photo')
                <div class="aler alert-danger">
                    Debe cargar una foto del plato
                </div>
                @enderror
                <div id="imagPrev">
                </div>
            </div>
           
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background: rgb(230,208,13);height: 50px;width: 152px;margin: 14px;padding: -4px;font-size: 16px;">Guardar Plato</button>
                </div>
        </form>
        
        <div class="">
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

    <div class="footer-clean" >
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
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
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