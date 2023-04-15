<?php

namespace App\Http\Controllers;
use App\documentos;

use Illuminate\Http\Request;
use App\asignadocumentos;
use App\expedientes;

class AsignaDocumentosController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(expedientes $asignadocumento)
    {
            //dd($asignadocumento);
            $id_expediente=$asignadocumento->id;
            //dd($id_expediente);
            $documentos=documentos::with('actuaciones')->where('id',$id_expediente)->first();
            //dd($documentos->actuaciones);
            //$actuacion=$documentos->actuaciones->Nombre;
            $ad=asignadocumentos::with('documentos','expedientes')
            ->where('expedientes_id',$id_expediente)
            ->where('incidencia',0)
            ->orderBy('created_at','DESC')->get();
            //$documentos=DB::select('SELECT * FROM documentos,actuaciones WHERE actuaciones.id=documentos.id_actuacion 
            //AND documentos.id_expedientes='.$id_expediente);
            //dd($ad);
            return view('asignadocumentos.show',compact('ad', 'asignadocumento'));
    }

    public function show_inc(expedientes $asignadocumento)
    {
            //dd($asignadocumento);
            $id_expediente=$asignadocumento->id;
            //dd($id_expediente);
            $documentos=documentos::with('actuaciones')->where('id',$id_expediente)->first();
            //dd($documentos->actuaciones);
            //$actuacion=$documentos->actuaciones->Nombre;
            $ad=asignadocumentos::with('documentos','expedientes')
            ->where('expedientes_id',$id_expediente)
            ->where('incidencia',1)
            ->orderBy('created_at','ASC')->get();
            //$documentos=DB::select('SELECT * FROM documentos,actuaciones WHERE actuaciones.id=documentos.id_actuacion 
            //AND documentos.id_expedientes='.$id_expediente);
            //dd($ad);
            return view('asignadocumentos.show_inc',compact('ad', 'asignadocumento'));
    }
    public function show_jdc(expedientes $expediente)
    {
        //dd("a1ui voy");    
        //dd($asignadocumento);
            $id_expediente=$expediente->id;
            //dd($id_expediente);
            $documentos=documentos::with('actuaciones')->where('id',$id_expediente)->first();
            //dd($documentos->actuaciones);
            //$actuacion=$documentos->actuaciones->Nombre;
            $ad=asignadocumentos::with('documentos','expedientes')->where('expedientes_id',$id_expediente)->orderBy('created_at','DESC')->get();
            //$documentos=DB::select('SELECT * FROM documentos,actuaciones WHERE actuaciones.id=documentos.id_actuacion 
            //AND documentos.id_expedientes='.$id_expediente);
            //dd($ad);
            return view('showdctos',compact('ad', 'expediente'));
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
    public function destroy(asignadocumentos $adoc)
    {
        $id_expediente=$adoc->expedientes_id;
        //dd($id_expediente);
        $adoc->delete();
		//Flash::warning('El área ha sido eliminada');
		//return redirect()->route('admin_area');

	    /*$this->emit('sweet-alert', 'la información se borro correctamente');
        $this->resetPage();*/
		//$status="El registro se ha eliminado correctamente";
		//return back()->with(compact('status'));
        $status="El documento se ha eliminado de manera correcta";
		$type="success";
		return back()->with(compact('status','type'));
    }
}
