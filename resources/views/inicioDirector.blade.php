@extends('layouts.plantillaDirector')

@section('contenido')
<div class="container">
    <div class="content-section-heading text-center">
      <h3 class="text-secondary mb-0"> ✔ Elige una de las opciones disponibles para el director</h3>
      <br>
    </div>
    <div class="row no-gutters">

      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/empresas">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">EMPRESAS</div>
              <p class="mb-0">Gestionar las Empresa</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/matriculas.jpg" alt="">
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/ofertaslaborales">
          <div class="caption">
            <div class="caption-content">
              <div class="h2">OFERTAS LABORALES</div>
              <p class="mb-0">Gestionar Ofertas Laborales</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/colegiofondo01.jpg" alt="">
        </a>
      </div>           
      <div class="col-12 col-sm-6 col-md-4">
        <a class="portfolio-item" href="/alumno">
          <div class="caption">
            <div class="caption-content">
              <div class="h2"> OPCION 3</div>
              <p class="mb-0">Gestionar Opcion 3</p>
            </div>
          </div>
          <img class="img-fluid" src="/img/ALUMNOS.jpg" alt="">
        </a>
      </div>
    
     

       
       
      
    </div>
  <!--</div>-->

<div class="row no-gutters">
  
    
</div>
</div>
@endsection
