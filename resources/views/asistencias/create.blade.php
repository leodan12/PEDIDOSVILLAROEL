@extends('layouts.plantillaEmpleado')

@section('contenido')

    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <h1 style="text-align: center">Nueva asistencia</h1>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">&nbsp;</div>
    </div>

     
  
        <form method="POST"  action="{{route('asistencia.store')}}" > <!--para que vaya a la ruta esa y luego vaya al controlador a llamar ee metodo-->
            @csrf   
           
         <div class="form-row">
            <div class="col col-4"></div>
            <div class="form-group col-md-4">
                <label for="estadoAsistencia">ESTADO DE LA ASISTENCIA</label>
                <select name="estadoAsistencia" id="estadoAsistencia" class="form-control"   style="border-radius: 40px;" required  >
                    <option  disabled selected> SELECCIONE UN ESTADO DE ASISTENCIA:</option>
                   
                <option value="PRESENTE">PRESENTE</option>
                <option value="AUSENTE">AUSENTE</option>
                <option value="TARDANZA">TARDANZA</option>
                    
                </select>
           </div>
             

        </div>
         
          
          <div class="row">
                <div class="col-md-4">&nbsp;</div> 
                <div class="col-md-4">
                    <button type="submit" style="border-radius: 40px;" class="btn btn-primary mr-4" ><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('cancelarAsistencia')}}" style="border-radius: 40px;" class="btn btn-danger"> <i class="fas fa-ban"></i> Cancelar</a>
                </div>
                <div class="col-md-3">&nbsp;</div> 
          </div>
          <div class="row"><div class="col-12">&nbsp;</div></div>   
        </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 