@extends('layouts.plantillaAdministrador')

@section('contenido')

    <div class="container-fluid" >
        <div class="row"><div class="col"> 
            <h1 style="text-align: center">Editar Usuario</h1>
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
        <form method="POST"  action="{{route('usuario.update',$usuario->id)}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @method('put')
             @csrf  
           
         <div class="form-row">
           
         <div class="col col-2"></div>  
      
         <div class="form-group col-md-5">
               
                 <label for="">Email</label>
                 <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  style="border-radius: 40px;" value="{{$usuario->email}}">
                 @error('email')
                     <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                      </span>                  
                 @enderror
         </div>

         <div class="from-group col-md-3">
            <label for="perfil">Rol</label>
            <select name="perfil" id="perfil" class="form-control"   style="border-radius: 40px;">
                <option value="{{$usuario->perfil->id}}"  selected> {{$usuario->perfil->perfil}}</option>
                @foreach ( $perfil as $itemp)
            <option value="{{$itemp->id}}">{{$itemp->perfil}}</option>
                @endforeach
            </select>

          </div>
            <div class="col col-2"></div>
            <div class="col col-2"></div>
            <div class="form-group col-md-5">
              <label for="usuario">Usuario</label>
            <input type="text" class="form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario"  style="border-radius: 40px;" value="{{$usuario->name}}">
              @error('usuario')
                  <span class="invalid-feedback" role="alert">
                       <strong>{{$message}}</strong>
                   </span>                  
              @enderror
           </div>

           <div class="from-group col-md-3">
            <label for="">Estado</label>
            <select name="estado" id="estado" class="form-control" required  style="border-radius: 40px;">
                
                     @if ($usuario->estado =='1') 
                     { <option value="{{$usuario->estado}}" selected >  ACTIVO  </option>
                     <option value="0">INACTIVO</option>
                    } @else 
                     { <option value="{{$usuario->estado}}" selected> INACTIVO </option>
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
                    <a href="{{route('cancelarUsuario')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
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

