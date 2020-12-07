<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Modificar Componente del menú</title>
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
                    
                    <li class="nav-item"><a class="nav-link" href="{{action('PlateController@index')}}">Lista Plato Especial</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{action('CompPlateController@index')}}">Componente Plato Ejecutivo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{action('DayController@index')}}">Semanario</a></li>
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
    
     
        <form action="{{route($tipoComp.'.update', $componet->id)}}" method="POST" class="justify-content-center" style="margin: 56px;width: 440px;height:auto;padding: 29px;" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH"></input>
            @if($tipoComp=='beverage')
                <h3 style="margin-bottom: 0px">Modificar  Bebida </h3>
             @elseif($tipoComp=='meat')   
             <h3 style="margin-bottom: 0px">Modificar  Carne </h3>

             @elseif ($tipoComp=='soup')
             <h3 style="margin-bottom: 0px">Modificar  Sopa </h3>

             @else
             <h3 style="margin-bottom: 0px">Modificar  Principio </h3>
             @endif

            <div class="illustration" style="width: 121px; height:121px; margin-top: 0px; ">
                <span class="iconify" data-icon="openmoji:fork-and-knife-with-plate" data-inline="false"style="margin-top: 0px; color: rgb(247,204,52);border-color: rgb(230,208,13);"></span></div>
            <div class="form-group">
               
                <label style="margin-top: 10px;" ><strong> Nombre </strong></label>
                <input class="form-control" type="text" name="name" placeholder="Nombre" value="{{$componet->name}}">
                @error('name')
                    <div class="aler alert-danger">
                        El campo Nombre es obligatorio
                    </div>
                @enderror
                
                
                <label style="margin-top: 10px;" ><strong> Foto </strong></label>
                 <input type="file" style="width: 270px;height: 45px;"  name="photo" id="photo" >
                @error('photo')
                <div class="aler alert-danger">
                    Debe cargar una foto 
                </div>
                @enderror

                <div id="imagPrev">
                    <img style="border: ridge; width: 250px; height: auto;" src="{{asset($componet->photo)}}">
                </div>
            </div>
            
            
           
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background: rgb(230,208,13);height: 50px;width: 152px;margin: 14px;padding: -4px;font-size: 16px;">Actualizar</button> 
                <button class="btn btn-primary  btn-block" onclick="{{redirect()->route('compPlate.index')->with('msj','bebida modificacion exitosa')}}" style="background: red;height: 50px;width: 152px;margin: 14px;padding: -4px;font-size: 16px;">cancelar</button>
                </div>
                
                
        </form>
        
        <div class="">
            
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