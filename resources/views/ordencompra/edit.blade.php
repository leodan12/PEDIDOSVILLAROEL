@extends('layouts.plantillaGerente')

@section('contenido')

    <div class="container-fluid" >
        <div class="row"><div class="col"> 
            <h1 style="text-align: center">Editar Orden de Compra</h1>
        </div></div>
       
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
        <form method="POST"  action="{{route('ordencompra.update',$ordencompra->id)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
         <div class="form-row">
           
         <div class="col col-2"></div>  
      
         <div class="from-group col-md-3">
            <label for="idcliente">CLIENTE</label>
            <select name="idcliente" id="idcliente" class="form-control"   style="border-radius: 40px;" readonly required>
                 
                @foreach($cliente as $key)

                    @if($key->id == $ordencompra->idcliente)
                    <option value="{{$key->id}}"  selected> {{$key->razonsocial}}</option>
                    
                    @endif
                        
                    @endforeach
            </select>

          </div>

         

         <div class="from-group col-md-3">
            <label for="estadoOrden">ESTADO ORDEN</label>
            <select name="estadoOrden" id="estadoOrden" class="form-control"   style="border-radius: 40px;" readonly required>
                <option value="{{$ordencompra->estadoOrden}}"  selected> {{$ordencompra->estadoOrden}}</option>
                
            </select>

          </div>
            <div class="col col-2"></div>
            <div class="col col-2"></div>
            <div class="col col-2"></div>
            <div class="form-group col-md-3">
              <label for="lugar">LUGAR</label>
            <input type="text" class="form-control @error('lugar') is-invalid @enderror" id="lugar" name="lugar"  style="border-radius: 40px;" value="{{$ordencompra->lugar}}" required>
              @error('lugar')
                  <span class="invalid-feedback" role="alert">
                       <strong>{{$message}}</strong>
                   </span>                  
              @enderror
           </div>
           <div class="form-group col-md-3">
            <label for="fechaorden">FECHA</label>
          <input type="date" class="form-control @error('fechaorden') is-invalid @enderror" id="fechaorden" name="fechaorden"  style="border-radius: 40px;" value="{{$ordencompra->fechaorden}}" required>
            @error('fechaorden')
                <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>                  
            @enderror
         </div>


           <div class="from-group col-md-3">
            <label for="">Estado</label>
            <select name="estado" id="estado" class="form-control" required  style="border-radius: 40px;">
                
                     @if ($ordencompra->estado =='1') 
                     { <option value="{{$ordencompra->estado}}" selected >  ACTIVO  </option>
                     <option value="0">INACTIVO</option>
                    } @else 
                     { <option value="{{$ordencompra->estado}}" selected> INACTIVO </option>
                     <option value="1">ACTIVO</option>
                    }
                @endif
                 
            </select>

          </div>

            

        </div>
        <div class="row">
                <div class="col-12">&nbsp;</div>
        </div>
        <div class="row"><div class="col-12">&nbsp;</div></div>   
          <div class="row"><div class="col-12">&nbsp;</div></div>
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mr-4" style="border-radius: 40px;"><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('cancelarOrden')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script>
     $(document).ready(function(){

        //funcion para verificar el usuario

        $("#usuario").keyup(function(){
    		 
        var usuario = $(this).val();
        var cont = 0    
        $.get('/usuarioslista', function(data){ 
         //   console.log(data);
             for(var i=0; i<data.length;i++){
                 if(data[i].name == usuario){
                 cont=cont+1
                 }
             }
             if(cont>=1){
                document.getElementById("usuario").style.borderColor="#FF0000"
             }
             else if(cont==0){
                document.getElementById("usuario").style.borderColor="#0fff12"
             }  
             
	});

	});

 

     
    });
 </script>

