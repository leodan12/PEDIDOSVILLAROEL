<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordencompra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;
class OrdenCompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
        
    const PAGINACION=4;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $ordencompra = DB::table('ordencompras as oc','oc.estado','=','1')
        ->join('cliente as c','oc.idCliente','=','c.id')
        ->where('oc.estadoOrden','like','%'.$buscarpor.'%')
        ->select('oc.id','c.razonsocial','c.ruc','c.direccion','oc.estadoOrden','oc.fechaorden','oc.lugar','oc.estado')
        ->paginate($this::PAGINACION); 

        return  view('ordencompra.index',compact('ordencompra','buscarpor'));  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente=DB::table('cliente as c','c.estado','=','1')->get(); 

        return view('ordencompra.create',compact('cliente'));  
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
            'idCliente'=>'required|max:50',
            'estadoOrden'=>'required|max:50',
            'lugar'=>'required|max:50'
            
        ],
        [  'idCliente.required'=>'Ingrese Un idCliente ',
            'estadoOrden.required'=>'Ingrese Un estadoOrden ',
            'lugar.required'=>'Ingrese Un lugar '
           
             
            ]);
    
             $ordencompra=new Ordencompra();    //instanciamos nuestro modelo usuario
             $ordencompra->estadoOrden=$request->estadoOrden;
             $ordencompra->fechaorden=date("Y-m-d");
             $ordencompra->lugar=$request->lugar;
             $ordencompra->idcliente=$request->idCliente;  //designamos el valor de perfil
            $ordencompra->estado='1';   //campo de descripcion
            $ordencompra->save();
              
            return   redirect()->route('ordencompra')->with('datos','Registro Nuevo Guardado...!'); 
            
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
         
        $ordencompra=Ordencompra::findOrfail($id);
        $cliente=DB::table('cliente as c','c.estado','=','1')
        ->join('ordencompras as oc','oc.idCliente','=','c.id')
        ->where('oc.id','=',$ordencompra->id)
        ->select('c.id','c.razonsocial')
        ->get(); 
          
        //return $ordencompra;
        return view('ordencompra.edit',compact('cliente','ordencompra'));

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
        $data=request()->validate([
            'idcliente'=>'required|max:50',
            'estadoOrden'=>'required|max:50',
            'lugar'=>'required|max:50',
            'fechaorden'=>'required|max:50'
            
        ],
        [  'idcliente.required'=>'Ingrese Un idCliente ',
            'estadoOrden.required'=>'Ingrese Un estadoOrden ',
            'lugar.required'=>'Ingrese Un lugar ',
            'fechaorden.required'=>'Ingrese Un fechaorden '
           
             
            ]);
    
             $ordencompra=  Ordencompra::findOrfail($id);     //instanciamos nuestro modelo usuario
             $ordencompra->estadoOrden=$request->estadoOrden;
             $ordencompra->fechaorden=$request->fechaorden;
             $ordencompra->lugar=$request->lugar;
             $ordencompra->idcliente=$request->idcliente;  //designamos el valor de perfil
            $ordencompra->estado=$request->estado;    //campo de descripcion
            $ordencompra->save();
              
            return   redirect()->route('ordencompra')->with('datos','Registro Actualizado...!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       $ordencompra=Ordencompra::findOrFail($id);
        if ( ($ordencompra->estado) =='1') {
         $ordencompra->estado='0';
         $ordencompra->save();
         return redirect()->route('ordencompra')->with('datos','Orden Compra Desactivado...!');
            }
         elseif(($ordencompra->estado) =='0') {
         $ordencompra->estado='1';
         $ordencompra->save();
         return redirect()->route('ordencompra')->with('datos','Orden Compra Activado...!');
         }
    }
}
