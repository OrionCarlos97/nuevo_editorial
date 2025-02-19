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
        <div class="container mt-4">            
            <div class="form">
                <form action="{{route('update.revista',$revista->id)}}" 
                    method="PUT">
                    <input 
                        type="hidden" 
                        id="revista" 
                        name="revista" 
                        value="{{$revista->id}}">
                        <div class="row">
                            <div class="col-lg-1 pt-1 col-sm-12">
                                Titulo: 
                            </div>
                            <div class="col-lg-9 pt-1 col-sm-12">
                                <input 
                                    class="form-control" 
                                    id="nombreRevista"
                                    name="nombreRevista"
                                    type="text" 
                                    value="{{$revista->titulo}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 pt-1 col-sm-12">
                                Articulo: 
                            </div>
                            <div class="col-lg-9 pt-1 col-sm-12">
                                <select 
                                    name="idArticulo" 
                                    id="idArticulo" 
                                    class="form-select"> 
                                    @foreach ($articulos as $item)                
                                    <option value="{{$item->id}}">                             
                                        {{$item->nombre}}
                                    </option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2 text-center pt-2 col-sm-12"> 
                                <button class="btn btn-sm btn-dark ps-3 pe-3" type="submit">Agregar Artículo</button>
                            </div>
                        </div>                        
                </form>
            </div>
            @if ($revista_articulo->count()>0)
            <section>
                <div class="row mt-5" >
                    <label for="" class="label text-center">Artículos Actuales</label>
                    <table class="table table-striped table-hover">
                        <thead >
                            <th class="col-1">Articulo #</th>
                            <th class="col-5">Titulo</th>
                            {{-- <th class="col-2">Ejmplares</th>
                            <th class="col-2">Páginas</th> --}}
                            <th class="col-2">Eliminar</th>
                        </thead>
                        <tbody>
                            @foreach ($revista_articulo as $item)  
                            <tr>
                                <td> {{$item->articulo->id}} </td>
                                <td> {{$item->articulo->nombre}} </td>
                                {{-- <td> {{$item->revista->num_ejemplares}} </td>
                                <td> {{$item->revista->num_paginas}} </td> --}}
                                <td>
                                    <button 
                                        type="button" 
                                        class="btn btn-sm btn-danger"
                                        id="btnEliminar"
                                        name="btnEliminar"
                                        onclick="eliminar({{$revista->id}},{{$item->articulo->id}})">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                            
                </div>
            </section>                
            @else
            <div class="alert alert-danger mt-2 text-center" role="alert">
                Esta revista no tiene asociado ningún artículo
            </div>
            @endif
                 
        </div>
    </body>
    <script>
        function eliminar(revista, articulo){
            let url = '{{route("delete.revista_articulo")}}/'+articulo+"/"+revista;            
            console.log(url);
            axios.delete(url).then(function(response) {
                // console.log(response.data);
                // console.log("Entro");
                location.reload();
            }).catch(function(error) {
                console.log(error.message);                
                
            });
        }
        
    </script>
</html>
