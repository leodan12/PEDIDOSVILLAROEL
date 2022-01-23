<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Perfil;
use Illuminate\Http\Request;  //aca esta request, significa solicitud.
use Illuminate\Support\Facades\Auth;   //siempre poner esto
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function index( Request $request){

        $buscarpor=$request->get('buscarpor');
        $usuarios=User::where('name','like','%'.$buscarpor.'%')->get();//->paginate($this::PAGINACION);  
       // $user=User::where('estado','=',TRUE)->get();
        return   view('usuarios.index',compact('usuarios','buscarpor'));  

    }
    public function usuarios( ){
        $usuarios =User::where('estado','=',TRUE)->get();
    return $usuarios;  
    }
    
    public function edit($id)
  {
    $perfil=Perfil::where('estado' ,'=','1')->get() ;
    $usuario=User::findOrfail($id);
      
      return view('usuarios.edit',compact('perfil','usuario'));
  }

  public function create()
  {
    $perfil=Perfil::where('estado' ,'=','1')->get() ;
      return view('usuarios.create' ,compact('perfil' ));
  }

  public function store(Request $request)
  {
    $input = $request->all();  
    $data=request()->validate([
        'perfil'=>'required|max:50',
        'usuario'=>'required|max:50',
        'email'=>'required|max:50',
        'password'=>'required',
        'confirmpassword'=>'required|same:password'
        
        
    ],
    [  'perfil.required'=>'Ingrese Un Perfil ',
        'usuario.required'=>'Ingrese Un usuario ',
        'email.required'=>'Ingrese Un email ',
        'password.required'=>'Ingrese Un estado ',
        'confirmpassword.required'=>'Ingrese Un estado '
         
        ]);

        if (Hash::check($request->password, hash::make($request->confirmpassword))) {
          $usuario=new User();    //instanciamos nuestro modelo usuario
          $usuario->perfils_id=$request->perfil;  //designamos el valor de perfil
          $usuario->name=$request->usuario;
          $usuario->email=$request->email;
          $usuario->password=hash::make( $request->password);
          $usuario->estado='1';   //campo de descripcion
          $usuario->save();
          
        return   redirect()->route('usuario.index')->with('datos','Registro Nuevo Guardado...!'); 
           }
           $request->flash(); 
        return  redirect()->route('usuario.create')->withInput();

          
         
  }


  public function update(Request $request, $id)
    {
        $data=request()->validate([
            'perfil'=>'required|max:50',
            'usuario'=>'required|max:50',
            'email'=>'required|max:50',
            'estado'=>'required|max:50'
            
        ],
        [  'perfil.required'=>'Ingrese Un Perfil ',
            'usuario.required'=>'Ingrese Un usuario ',
            'email.required'=>'Ingrese Un email ',
            'estado.required'=>'Ingrese Un estado '
             
            ]);

        $usuario=User::findOrfail($id);    //instanciamos nuestro modelo perfil
        $usuario->perfils_id=$request->perfil;  //designamos el valor de descripcion
        $usuario->estado=$request->estado;  //designamos el valor de descripcion
        $usuario->name=$request->usuario;  //designamos el valor de descripcion
        $usuario->email=$request->email;  //designamos el valor de descripcion
        $usuario->save();  
            
        return redirect()->route('usuario.index')->with('datos','Registro Actualizado...!'); 
    }
    
     
    public function login(Request $request){          //Vamos a realizar una validacion
        
        
        $data=request()->validate([    //es validate

            'name'=>'required',   //es required
            'password'=>'required'      //no va COOOOOOMA
        
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese Contraseña',

        ]);

       

        $name=$request->get('name');
        $query=User::where('name','=',$name)->get();
        if($query->count() !=0  ){    //count significa que no es igual a 0 , cuenta, encontro al usuario
            if($query[0]->estado=='1'){

                if(Auth::attempt($data)){  //   Vamos a tener diferentes paginas

                    $con='OK';
                }
                
            $hashp=$query[0]->password;
            $password=$request->get('password');
            $perfils_id=$request->get('perfils_id');

            if (password_verify($password,$hashp)) {   //si son iguales
               if(Auth::user()->perfils_id=='1'){
                return redirect('/administrador');
               }
               elseif(Auth::user()->perfils_id=='2'){
                return redirect('/docente');
               }
               elseif(Auth::user()->perfils_id=='3'){
                return redirect('/director');
               }
              
               
            }
            else{
                return back()->withErrors(['password'=>'Contraseña no válida '])->withInput([request('password')]);
            }

            }
            else {
                return back()->withErrors(['name'=>'Usuario desactivado'])->withInput([request('usuario')]);
   

            }
        

        }else{

            return back()->withErrors(['name'=>'Usuario no válido'])->withInput([request('usuario')]);

        }
    }
    /*public function create()
    {
        return view('cuenta');
    }
    public function RegistrarUser()
    {
        return view('cuenta');
    }*/
    public function integrantes()
    {
        return view('integrantes');
    }
 
    
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        if ( ($user->estado) =='1') {
         $user->estado='0';
         $user->save();
         return redirect()->route('usuario.index')->with('datos','Usuario Desactivado...!');
            }
         elseif(($user->estado) =='0') {
         $user->estado='1';
         $user->save();
         return redirect()->route('usuario.index')->with('datos','Usuario Activado...!');
         } 

}
}
   