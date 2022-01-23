 

@extends('layouts.app')

@section('content')

 <ul class="form-group row">
                             
                       
                        </ul>


<div class="col-md-4 ml-auto mr-auto">
    <div class="card card-login card-plain">
<div class="card card-login card-plain">
<div class="card-header text-center">
    <div class="logo">
        <img src="\img\logo.png" alt="">
    </div>
  </div>
  <br>
  <br>
                <div class="card-body-center">
                     
                </div>

                
        
                    

    
@if (Route::has('login'))
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">

<h4>
    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">INICIAR SESION</a>
</h4>
    

</div>
@endif




 

            </div>
        </div>
    </div>
             
  

@endsection







 