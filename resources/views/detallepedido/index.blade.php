@extends('layouts.plantillaGerente')
@section('contenido')
<style>
  :root {
    --body-bg-color: #1a1c1d;
    --hr-color: #26292a;
    --red: #e74c3c;
  }
  
  a {
    color: inherit;
    text-decoration: none;
  }
  
  .menu {
    display: flex;
    justify-content: center;
  }
  .alinealo{
    justify-content: center;
  }
  .menu a {
    position: relative;
    display: block;
    overflow: hidden;
  }
  
  .menu a span {
    transition: transform 0.2s ease-out;
  }
  
  .menu a span:first-child {
    display: inline-block;
    padding: 10px;
  }
  
  .menu a span:last-child {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateY(-100%);
  }
  
  .menu a:hover span:first-child {
    transform: translateY(100%);
  }
  
  .menu a:hover span:last-child,
  .menu[data-animation] a:hover span:last-child {
    transform: none;
  }
  .menu[data-animation="to-top"] a span:last-child {
    transform: translateY(100%);
  }
  
  .menu[data-animation="to-top"] a:hover span:first-child {
    transform: translateY(-100%);
  }
  
  .menu[data-animation="to-right"] a span:last-child {
    transform: translateX(-100%);
  }
  
  .menu[data-animation="to-right"] a:hover span:first-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a span:last-child {
    transform: translateX(100%);
  }
  
  .menu[data-animation="to-left"] a:hover span:first-child {
    transform: translateX(-100%);
  }
  table tbody {
    background-color: #8ce1fd;
  }
  table tr:hover {
    background-color: #E3E4E5;
  }
  
  </style>
<div class="container-fluid ">
  <div class="form-group">
    
    <div class="container">
      <h3 class="text-center">LISTADO DE ORDENES DE COMPRA</h3>
      <div class="d-none d-md-block col-12" style="position: relative;right: 40%">
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../gerente" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
      </div>
      <div class="col-12 d-md-none" >
        <button class=" btn btn-success" style="border-radius: 40px;"   type="menu"><a class="text-white" href="../gerente" ><i class="fas fa-arrow-left"> </i> Regresar</a> </button>
      </div>

    @if(session('datos'))
      <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <nav class="navbar navbar-light ">
      <a href="{{route('agregarpedido',$ordencompra->id)}}" class="btn btn-success" style="border-radius: 40px;"><i class="fas fa-plus"></i>Agregar Nuevos productos</a><br>
      
  
  </nav> 

      <br>
      <div class="table-responsive"  style="border-radius: 12px;">
        <table class="table" style="border-radius: 12px;">
        <thead class="thead-dark">
          <tr>
            <th scope="col"style="text-align: center">ID  </th>
            <th scope="col" style="text-align: center">PRODUCTO</th>
            <th scope="col" style="text-align: center">DESCRIPCION</th>
            <th scope="col" style="text-align: center">CANTIDAD</th>
            <th scope="col" style="text-align: center">UNIDAD</th>
            
            <th scope="col" style="text-align: center;" >ELIMINAR</th>
          </tr>
        </thead>
        <tbody>
            @foreach($detallepedido as $k)
                <tr>
                    <td style="text-align: center">{{$k->id}}</td>
                    <td style="text-align: center">{{$k->idproducto}}</td>
                    <td style="text-align: center">{{$k->descripcion}}</td>
                    <td style="text-align: center">{{$k->cantidad}}</td>
                    <td style="text-align: center">{{$k->unidad}}</td>
                     
                     
                    <td>
                        <div class="form-group" style="text-align: center">
                          <form class="submit-eliminar " action="{{action('DetallepedidoController@destroy', $k->id)}}" method="post">
                             @csrf
                             <input name="_method" type="hidden" value="DELETE">
                             <button onclick="return confirm('Desea eliminar el producto pedido?')" style="border-radius: 40px;" type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash" ></i>
                               
                                   Eliminar                                    
                                
                          </button>
                           </form>
                          </div>
                      </td>
                </tr>   
            @endforeach
        </tbody>
    </table>  
     
      <div class="align-center" style="margin-left: 45%"> {{$detallepedido->links()}} </div>
</div>

@endsection