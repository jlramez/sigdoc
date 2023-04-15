<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\actuaciones;

class ActuacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $nact=$request->get('search');	
        $actuaciones=actuaciones::orderBy('Nombre','ASC')
        ->Nombre($nact)        
        ->paginate(10);
        //$actuaciones=actuaciones::OrderBy('Nombre','ASC')->paginate(10);
       
        return view('actuaciones.index', compact('actuaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('actuaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->activo=="on")
          $activo=1;
        if($request->activo=="off")
          $activo=0;
          

        $actuaciones=new actuaciones();
        $actuaciones->Nombre= $request->actuacion_nombre;
        $actuaciones->clave=$request->clave;
		$actuaciones->activo= $activo;		
		$actuaciones->save();
		//dd ($request->all(), $id_interposicion,$id_juicio,$id_estatus);
		$status="La actuación se ha almacenado de manera correcta";
		$type="success";
		//$type="alert alert-success";				
		return back()->with(compact('status','type'));
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
    public function edit(actuaciones $actuacione)
    {
        return view('actuaciones.edit', compact('actuacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actuaciones $actuacione)
    {
        $activo=0;
        if($request->activo=="on")
        {
            $activo=1;
        }
            $actuacione->Nombre= $request->actuacion_nombre;
        $actuacione->clave=$request->clave;
		$actuacione->activo= $activo;		
		$actuacione->save();
		//dd ($request->all(), $id_interposicion,$id_juicio,$id_estatus);
		$status="La actuación se ha actualizado de manera correcta";
		$type="success";
		//$type="alert alert-success";				
		return back()->with(compact('status','type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(actuaciones $actuacion)
    {
        $actuacion->delete();
		//Flash::warning('El área ha sido eliminada');
		//return redirect()->route('admin_area');

	    /*$this->emit('sweet-alert', 'la información se borro correctamente');
        $this->resetPage();*/
		$status="El registro se ha eliminado correctamente";
		//return back()->with(compact('status'));
        //$status="El expediente se ha almacenado de manera correcta";
		$type="success";
		return redirect()->route('actuaciones.index', compact('status','type'));
    }
}
