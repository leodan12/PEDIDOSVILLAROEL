<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    
   public function index( Request $request){

      $buscarpor=$request->get('buscarpor');
      $perfil=Perfil::where('perfil','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
      
   //  $user=perfil::where('estado','=',TRUE)->get();
      return  view('perfiles.index',compact('perfil','buscarpor'));  

  }



  public function create()
    {
        
        return view('perfiles.create' );
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'perfil'=>'required|max:50',
            
        ],
        [
            'perfil.required'=>'Ingrese Un Perfil '
             
            ]);
  
            $perfil=new Perfil();    //instanciamos nuestro modelo perfil
            $perfil->perfil=$request->perfil;  //designamos el valor de perfil
            $perfil->estado='1';   //campo de descripcion
            $perfil->save();
            
              return redirect()->route('perfil.index')->with('datos','Registro Nuevo Guardado...!'); 
           
    }


  public function edit($id)
  {
      $perfil=Perfil::findOrfail($id);
      
      return view('perfiles.edit',compact('perfil'));
  }
  
  public function update(Request $request, $id)
    {
        $data=request()->validate([
            'perfil'=>'required|max:50',
            'estado'=>'required|max:2'
        ],
        [
            'perfil.required'=>'Ingrese curso ',
             
            ]);
  
            $perfil=Perfil::findOrfail($id);    //instanciamos nuestro modelo perfil
            $perfil->perfil=$request->perfil;  //designamos el valor de descripcion
            $perfil->estado=$request->estado;  //designamos el valor de descripcion
            $perfil->save();  
            
            return redirect()->route('perfil.index')->with('datos','Registro Actualizado...!');    
    }

    public function destroy($id)
    {
        $perfil=Perfil::findOrFail($id);
        if ( ($perfil->estado) =='1') {
         $perfil->estado='0';
         $perfil->save();
         return redirect()->route('perfil.index')->with('datos','Rol Desactivado...!');
            }
         elseif(($perfil->estado) =='0') {
         $perfil->estado='1';
         $perfil->save();
         return redirect()->route('perfil.index')->with('datos','Rol Activado...!');
         }
         
        
         
        
    }

    public function administrador()
    {
       //return "eres un administrador... estas a cargo del sistema";
       return view('inicioAdministrador');

    }

   
    public function docente()
    {
       //return "eres un secretariaE... estas a cargo del sistema";
       return view('inicioDocente');

    }

    public function director()
    {
       //return "eres un secretariaC... estas a cargo del sistema";
       return view('inicioDirector');

    }
 
}
