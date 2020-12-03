<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Resumen Carro </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="panel-group col-sm-2" id="accordion">
    <input type="button" class="btn btn-info" value="Mis Pedidos">
    <div id="toggle-example" class="collapse">
        <p>
            @if(count(Cart::getContent()))
            @foreach (Cart::getContent as $item)

                {{$item->name}}..{{$item->price}}

            @endforeach
            Total {{number_format(Cart::getSubTotal(),2)}}

            @else
                <p> Carrito Vacio </p>
            @endif
        </p>
    </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".btn").click(function(){
                    $("#toggle-example").collapse('toggle');
                });
            });
        </script>
   
           
            
    <a class="btn btn-success pull-righ" roles="button">Add to Cart</a>
</div>
    
   

</body>
</html>    