@extends('layouts.plantillaAdministrador')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nuevo Usuario</h1>
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
  
        <form method="POST"  action="{{route('usuario.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
            <div class="form-row">
                <div class="col col-4"></div>
                <div class="from-group col-md-4">
                    <label for="perfil">Rol</label>
                    <select name="perfil" id="perfil" class="form-control"   style="border-radius: 40px;" required  >
                        <option value="{{ old('perfil') }}" disabled selected> SELECCIONE UN ROL:</option>
                        @foreach ( $perfil as $itemp)
                    <option value="{{$itemp->id}}">{{$itemp->perfil}}</option>
                        @endforeach
                    </select>
        
                  </div>
            </div>
           

         <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario"  style="border-radius: 40px;" required value="{{ old('usuario') }}">
                @error('usuario')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
        </div>
        <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  style="border-radius: 40px;" required value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
        </div>
        <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  style="border-radius: 40px;" required  >
                @error('password')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{$message}}</strong>
                     </span>                  
                @enderror
           </div>
        </div>
        <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="confirmpassword">Confirmar Contraseña</label>
                <input type="password"    class="form-control @error('confirmpassword') is-invalid @enderror" id="confirmpassword" name="confirmpassword"  style="border-radius: 40px;  " required  >
                @error('confirmpassword')
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
                    <a href="{{route('cancelarUsuario')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
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



        //funcion para verificar la contraseña

        $("#confirmpassword").keyup(function(){
    		if($("#password").val() === $("#confirmpassword").val()){
         //Si son iguales
         document.getElementById("confirmpassword").style.borderColor="#0fff12"
        }else if($("#password").val() !== $("#confirmpassword").val()){
         //Si no son iguales
         document.getElementById("confirmpassword").style.borderColor="#FF0000"
    } 
	});

     
    });
 </script>

