@extends('layouts.plantillaGerente')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nueva Detalle de la orden</h1>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">&nbsp;</div>
    </div>

    @if(session('datos'))  <!--Buscar una alerta en el caso q nuestro registro ha sido guardado o hemos cancelado-->
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
      {{ session('datos')   }}
        <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  </div>
  @endif
  
        <form method="POST"  action="{{route('detallepedido.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
            
            <div class="form-row">
                <div class="col col-4"></div>
                <div class="from-group col-md-4">
                    <label for="idordencompra">ORDEN</label>
                    <select name="idordencompra" id="idordencompra" class="form-control"   style="border-radius: 40px;" required  readonly  >
                        <option value="{{$ordencompra->id}}"  selected> {{$ordencompra->id}} / {{$ordencompra->estadoOrden}} / / {{$ordencompra->fechaorden}} / {{$ordencompra->lugar}}</option>
                        
                    </select>
        
                  </div>
            </div>
            <div class="form-row">
                <div class="col col-4"></div>
                <div class="from-group col-md-4">
                    <label for="idproducto">PRODUCTO</label>
                    <select name="idproducto" id="idproducto" class="form-control"   style="border-radius: 40px;" required  >
                        <option   disabled selected> SELECCIONE UN PRODUCTO:</option>
                        @foreach ( $producto as $itemp)
                    <option value="{{$itemp->id}}">{{$itemp->nombre}} / {{$itemp->preciomayor}} </option>
                        @endforeach
                    </select>
        
                  </div>
            </div>

         <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="cantidad">CANTIDAD</label>
                <input type="number" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" name="cantidad"  style="border-radius: 40px;" required>
                @error('cantidad')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
             

        </div>
        <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="unidad">UNIDAD</label>
                <select name="unidad" id="unidad" class="form-control"   style="border-radius: 40px;" required  >
                    <option  disabled selected> SELECCIONE UNA UNIDAD:</option>
                   
                <option value="CAJAS">CAJAS</option>
                <option value="JABAS">JABAS</option>
                <option value="SACOS">SACOS</option>
                    
                </select>
           </div>
             

        </div>
        <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="descripcion">DESCRIPCION</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"  style="border-radius: 40px;" required>
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
             

        </div>
        <div class="row">
                <div class="col-12">&nbsp;</div>
        </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" style="border-radius: 40px;" class="btn btn-primary mr-4" ><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('detallededido',$ordencompra->id)}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 