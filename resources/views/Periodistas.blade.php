<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editorial</title>
        <!--popper js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- axios -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">Editorial</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('articulos')}}">Articulos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Revistas
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="{{route('agregarRevistas')}}">Añadir Revista</a></li>
                                    <li><a class="dropdown-item" href="{{route('revistas')}}">Ver Revistas</a></li>
                                  
                                </ul>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="#">Empleados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('periodistas')}}">Periodistas</a>
                            </li>
                        </ul>             
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <table class="table table-striped table-hover">
                <thead>
                    <th class="col-4">Nombre</th>
                    <th class="col-3">Telefono</th>
                    <th class="col-4">Especialidad</th>
                    <th class="col-1">Ver</th>
                </thead>
                <tbody>
                    @foreach ($periodistas as $item)
                        <tr>
                            <td>{{$item->nombre}} {{$item->apellido}}</td>                        
                            <td>{{$item->telefono}}</td>                        
                            <td>{{$item->especialidad}}</td>
                            <td>
                                <form action="{{route('periodista',$item->id)}}" method="GET">
                                    <button class="btn btn-dark btn-sm border m-1 ps-3 pe-3" type="submit">
                                        Ver
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        
            
            
        
        
            
                
                


        
    </body>
    <script>
        // function verArticulo(id){
        //     var url =  "{{asset('articulo')}}/"+id;
        //     console.log(url);
        //     axios.get(url).then(function(response) {
                
        //         console.log(response.data);

        //     }).catch(e => {
        //         // Podemos mostrar los errores en la consola
        //         console.log(e);
        //     });
            
        // }
    </script>
</html>
