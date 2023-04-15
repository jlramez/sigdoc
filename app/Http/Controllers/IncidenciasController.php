<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\incidencias;
use App\expedientes;
use App\actuaciones;

class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //$rsactuacion=actuaciones::all();
		$folio=$request->get('search');
		$incidencias=incidencias::orderBy('created_at','DESC')
			->clave_inc($folio)
			->paginate(10);
        //$expedientes=expedientes::paginate(10);
      
        return view('incidencias.index', compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$year=years::all()->get();  
        $rsexpedientes=expedientes::orderBy('folio','DESC')->get();
        return view('incidencias.create',compact('rsexpedientes'));
    }

    public function add_incidencia(incidencias $incidencia)
    {
        //$year=years::all()->get();  
        
        return view('incidencias.add',compact('incidencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_inc(Request $request, expedientes $expediente)
    {
        
        $incidencias=new incidencias();
        $incidencias->expedientes_id= $expediente->id;
        $incidencias->clave_inc=$expediente->folio."-INC";	
		$incidencias->updated_at= now();
		$incidencias->created_at= now();
		$incidencias->save();
		//dd ($request->all(), $id_interposicion,$id_juicio,$id_estatus);
		$status="La incidencia se ha almacenado de manera correcta";
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
    public function destroy(incidencias $incidencia)
    {
        $incidencia->delete();
		//Flash::warning('El área ha sido eliminada');
		//return redirect()->route('admin_area');

	    /*$this->emit('sweet-alert', 'la información se borro correctamente');
        $this->resetPage();*/
		//$status="El registro se ha eliminado correctamente";
		//return back()->with(compact('status'));
        $status="La incidencia se ha eliminado de manera correcta";
		$type="success";
		return redirect()->route('incidencias.index', compact('status','type'));
    }
}
