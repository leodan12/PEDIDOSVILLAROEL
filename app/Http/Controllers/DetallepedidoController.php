<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordencompra;
use App\Models\Detalleorden;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;   //siempre poner esto ....
use Illuminate\Support\Facades\Hash;
class DetallepedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    const PAGINACION=4;
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
         
        $producto = DB::table('producto as p','p.estado','=','1')->get();

        $ordencompra=Ordencompra::findOrfail($id);

        return  view('detallepedido.create',compact('ordencompra','producto'));  
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
            'idordencompra'=>'required|max:50',
            'idproducto'=>'required|max:50',
            'cantidad'=>'required|max:50',
            'unidad'=>'required|max:50',
            'descripcion'=>'required|max:50',
            
        ],
        [  'idordencompra.required'=>'Ingrese Un idordencompra ',
            'idproducto.required'=>'Ingrese Un idproducto ',
            'cantidad.required'=>'Ingrese Un cantidad ',
            'unidad.required'=>'Ingrese Un unidad ',
            'descripcion.required'=>'Ingrese Un descripcion '
           
             
            ]);
    
             $detallepedido=new Detalleorden();    //instanciamos nuestro modelo usuario
             $detallepedido->idordencompra=$request->idordencompra;
             $detallepedido->idproducto=$request->idproducto;
             $detallepedido->cantidad=$request->cantidad;
             $detallepedido->unidad=$request->unidad;  //designamos el valor de perfil
             $detallepedido->descripcion=$request->descripcion;  //designamos el valor de perfil
            $detallepedido->estado='1';   //campo de descripcion
            $detallepedido->save();
           // {{route('detallededido',$ordencompra->id)}}
            return   redirect()->route('detallededido',$request->idordencompra)->with('datos','Registro Nuevo Guardado...!'); 
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
       
        $detallepedido = DB::table('detalleordens as dp','dp.estado','=','1')
        ->join('ordencompras as oc','oc.id','=','dp.idordencompra')
        ->where('oc.id','=',$id)
        ->join('producto as p','p.id','=','dp.idproducto')
        ->select('dp.id','dp.descripcion','dp.unidad','dp.cantidad','dp.idproducto','dp.idordencompra')
        ->paginate($this::PAGINACION); 

        $ordencompra=Ordencompra::findOrfail($id);

        return  view('detallepedido.index',compact('detallepedido','ordencompra'));  

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
        $detalleorden = Detalleorden::findOrFail($id);
        $orden=$detalleorden->idordencompra;
        $detalleorden->delete();
        
        return   redirect()->route('detallededido',$orden); 
  
    }
}
