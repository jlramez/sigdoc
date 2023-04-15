<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expedientes;
use App\actuaciones;
use App\juicios;
use App\years;
use Illuminate\Support\Facades\DB;

class ExpedientesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rsactuacion=actuaciones::all();
		$folio=$request->get('search');
		$expedientes=expedientes::orderBy('id','ASC')
			->folio($folio)
			->paginate(10);
        //$expedientes=expedientes::paginate(10);
      
        return view('expedientes.index', compact('expedientes', 'rsactuacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$year=years::all()->get();  
        $rsjuicios=juicios::orderBy('Nombre','ASC')->get();
        return view('expedientes.create',compact('rsjuicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$id_juicio=$request->juicio_id;
		//dd($id_juicio);
			if ($id_juicio==1)
			{
				$prefix='JDC';
				
				
			}
			if ($id_juicio==2)
			{
				$prefix='RR';
				
				
			}
			if ($id_juicio==3)
			{
				$prefix='JNE';
				
				
			}
			if ($id_juicio==4)
			{
				$prefix='JRL';
				
				
			}	if ($id_juicio==5)
			{
				$prefix='AG';
				
				
			}
				if ($id_juicio==6)
			{
				$prefix='PES';
				
				
			}

				if ($id_juicio==7)
				{
					$prefix='JE';
					
					
				}
                if ($id_juicio==8)
				{
					$prefix='LSP';
					
					
				}
                if ($id_juicio==9)
				{
					$prefix='ASP';
					
					
				}
                if ($id_juicio==10)
				{
					$prefix='AG';
					
					
				}
                if ($id_juicio==11)
				{
					$prefix='RC';
					
					
				}
                if ($id_juicio==12)
				{
					$prefix='CFDVEGE';
					
					
				}
             
		
		$fecha=now();	
		$fecha_int=strtotime($fecha);
        $anio= $request->year;
		//$anio= date("Y", $fecha_int);
		$maximo=DB::select('SELECT MAX(consecutivo) as contador FROM expedientes WHERE juicios_id='.$id_juicio.' and anio='.$request->year); // reinicar contador conforme año 
		
		
        if ($id_juicio==1||$id_juicio==2||$id_juicio==3||$id_juicio==5)
		{
			$grupo='1';
			//$maximo=DB::select('SELECT MAX(consecutivo) as contador FROM expedientes WHERE grupo='.$grupo);
			
		}
		if ($id_juicio==4||$id_juicio==6||$id_juicio==7)
		{
			$grupo='2';
			//$maximo=DB::select('SELECT MAX(consecutivo) as contador FROM expedientes WHERE grupo='.$grupo);
		
		}
        if ($id_juicio==8||$id_juicio==9||$id_juicio==10||$id_juicio==11||$id_juicio==12)
		{
			$grupo='3';
			//$maximo=DB::select('SELECT MAX(consecutivo) as contador FROM expedientes WHERE grupo='.$grupo);
		
		}
	 
		$consecutivo_siguiente=intval($maximo[0]->contador) + 1;
		$folio='TRIJEZ-'.$prefix.'-'.$anio.'-00'.($consecutivo_siguiente);
		//dd($maximo,$anio,$grupo,$prefix,$folio,$consecutivo_siguiente);	
		//dd ($request->all(), $id_interposicion,$id_juicio,$id_estatus);
       // dd($folio);
		$expedientes=new expedientes();
        $expedientes->consecutivo= $consecutivo_siguiente;
        $expedientes->juicios_id= $id_juicio;
		$expedientes->folio= $folio;
        $expedientes->anio= $request->year;		
		$expedientes->updated_at= now();
		$expedientes->created_at= now();
		$expedientes->save();
		//dd ($request->all(), $id_interposicion,$id_juicio,$id_estatus);
		$status="El expediente se ha almacenado de manera correcta";
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
    public function destroy(expedientes $expediente)
    {
        $expediente->delete();
		//Flash::warning('El área ha sido eliminada');
		//return redirect()->route('admin_area');

	    /*$this->emit('sweet-alert', 'la información se borro correctamente');
        $this->resetPage();*/
		//$status="El registro se ha eliminado correctamente";
		//return back()->with(compact('status'));
        $status="El expediente se ha eliminado de manera correcta";
		$type="success";
		return redirect()->route('expedientes.index', compact('status','type'));
    }
}
