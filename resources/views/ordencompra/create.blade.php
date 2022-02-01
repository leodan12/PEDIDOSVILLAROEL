@extends('layouts.plantillaGerente')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nueva Orden de Compra</h1>
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
  
        <form method="POST"  action="{{route('ordencompra.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
            <div class="form-row">
                <div class="col col-4"></div>
                <div class="from-group col-md-4">
                    <label for="idCliente">CLIENTE</label>
                    <select name="idCliente" id="idCliente" class="form-control"   style="border-radius: 40px;" required  >
                        <option value="{{ old('idCliente') }}" disabled selected> SELECCIONE UN CLIENTE:</option>
                        @foreach ( $cliente as $itemp)
                    <option value="{{$itemp->id}}">{{$itemp->razonsocial}}</option>
                        @endforeach
                    </select>
        
                  </div>
            </div>
            <div class="form-row">
                <div class="col col-4"></div>
                <div class="from-group col-md-4">
                    <label for="estadoOrden">ESTADO ORDEN</label>
                    <select name="estadoOrden" id="estadoOrden" class="form-control"   style="border-radius: 40px;" required  readonly  >
                        <option value="PARA LISTAR"  selected> PARA LISTAR</option>
                        
                    </select>
        
                  </div>
            </div>

         <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="lugar">LUGAR</label>
                <input type="text" class="form-control @error('lugar') is-invalid @enderror" id="lugar" name="lugar"  style="border-radius: 40px;" required>
                @error('lugar')
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
                    <a href="{{route('cancelarOrden')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 