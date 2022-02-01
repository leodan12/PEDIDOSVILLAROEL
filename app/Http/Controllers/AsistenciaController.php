<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordencompra;
use App\Models\Asistencia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;

class AsistenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    const PAGINACION=4;
    public function index(Request $request)
    {
        $us= $user=Auth::user()->id;
        $asistencia = DB::table('asistencias as a','a.estado','=','1')
        ->join('personal as p','p.id','=','a.idpersonal')
        ->join('users as u','u.id','=','p.idUsuario')
        ->where('u.id','=',$us)
        ->select('a.id','a.estadoAsistencia','a.fecha')->paginate($this::PAGINACION); 
        return  view('asistencias.index',compact('asistencia'));  
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $us= $user=Auth::user()->id;
        $personal=DB::table('personal as p','p.estado','=','1')
        ->where('p.idUsuario','=',$us)->get(); 

        return view('asistencias.create',compact('personal','us'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'estadoAsistencia'=>'required|max:50',
            
        ],
        [
            'estadoAsistencia.required'=>'Ingrese Un estadoAsistencia '
             
            ]);
            $us= $user=Auth::user()->id;
            $personal=DB::table('personal as p','p.estado','=','1')
            ->where('p.idUsuario','=',$us)->first(); 

            $asistencia=new Asistencia();    //instanciamos nuestro modelo perfil
            $asistencia->fecha=date("Y-m-d");  //designamos el valor de perfil
            $asistencia->estadoAsistencia=$request->estadoAsistencia;  //designamos el valor de perfil
            $asistencia->idpersonal=$personal->id;  //designamos el valor de perfil
            $asistencia->estado='1';   //campo de descripcion
            $asistencia->save();
            
              return redirect()->route('asistencia')->with('datos','Registro Nuevo Guardado...!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
