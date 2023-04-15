<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expedientes;
use App\actuaciones;
use App\documentos;
use App\asignadocumentos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DocumentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }/**
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
        
    }

    public function atach (expedientes $expedientes)
    {
        
        $actuaciones=actuaciones::where('activo',1)->orderBy('Nombre','ASC')->get();
        //dd($actuaciones);
        return view('documentos.create',compact('expedientes','actuaciones'));

    }
    
    public function atach_inc (expedientes $expedientes)
    {
        
        $actuaciones=actuaciones::where('activo',1)->orderBy('Nombre','ASC')->get();
        //dd($actuaciones);
        return view('documentos.doc_inc',compact('expedientes','actuaciones'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store_atach(expedientes $expedientes, Request $request)
    {
        //dd($request);
       // dd($expedientes->id);
     $actuaciones=actuaciones::where('id',$request->actuacion_id)->first();
				//$validatedData= $request->validate(['fojas' => 'required']);//aqui
                $fecha=now();	
                $fecha_int=strtotime($fecha);
                $anio= date("Y", $fecha_int);
				//$id_aa=$aa->id;
				$folio=$expedientes->folio;           
               
				$max_size=(int)ini_get('upload_max_filesize')*10240;
				if($request->hasFile('documento'))
				{
					$documentos=$request->file('documento');
                    //dd($documentos, $fecha. $anio, $folio );
					foreach($documentos as $documento)
						{
							$file_name=encrypt($documento->getClientOriginalName()).'.'.$documento->getClientOriginalExtension();
							if(Storage::PutFileAs('/public/'.'/estrados/'.$anio.'/'.$folio.'/', $documento,  $documento->getClientOriginalName()))
								{
									documentos::create([
                                     'actuaciones_id' => $actuaciones->id,   
									'nombre_dcto'=>$documento->getClientOriginalName(),
									'code_name' => $file_name,
									'created_at'=>now(),
									'updated_at'=>now()	
									]);
                    $last_documento=DB::select('SELECT MAX(id) as ultimo_documento FROM documentos' );
                    //dd($last_documento[0]->ultimo_documento);
                    $id_last_doc=($last_documento[0]->ultimo_documento);                    
                                    asignadocumentos::create([
                                        'expedientes_id'=>$expedientes->id,
                                        'documentos_id' => $id_last_doc,
                                        'incidencia' => '0',
                                        'created_at'=>now(),
                                        'updated_at'=>now()	
                                        ]);
								}				

							
						
						}
				}
			$status="El registro se ha guardado correctamente";
		return back()->with(compact('status'));
    } 
    
    public function store_atach_inc(expedientes $expedientes, Request $request)
    {
        //dd($request);
       // dd($expedientes->id);
     $actuaciones=actuaciones::where('id',$request->actuacion_id)->first();
				//$validatedData= $request->validate(['fojas' => 'required']);//aqui
                $fecha=now();	
                $fecha_int=strtotime($fecha);
                $anio= date("Y", $fecha_int);
				//$id_aa=$aa->id;
				$folio=$expedientes->folio;           
               
				$max_size=(int)ini_get('upload_max_filesize')*10240;
				if($request->hasFile('documento'))
				{
					$documentos=$request->file('documento');
                    //dd($documentos, $fecha. $anio, $folio );
					foreach($documentos as $documento)
						{
							$file_name=encrypt($documento->getClientOriginalName()).'.'.$documento->getClientOriginalExtension();
							if(Storage::PutFileAs('/public/'.'/estrados/'.$anio.'/'.$folio.'/incidencia/', $documento,  $documento->getClientOriginalName()))
								{
									documentos::create([
                                     'actuaciones_id' => $actuaciones->id,   
									'nombre_dcto'=>$documento->getClientOriginalName(),
									'code_name' => $file_name,
									'created_at'=>now(),
									'updated_at'=>now()	
									]);
                    $last_documento=DB::select('SELECT MAX(id) as ultimo_documento FROM documentos' );
                    //dd($last_documento[0]->ultimo_documento);
                    $id_last_doc=($last_documento[0]->ultimo_documento);                    
                                    asignadocumentos::create([
                                        'expedientes_id'=>$expedientes->id,
                                        'documentos_id' => $id_last_doc,
                                        'incidencia' => '1',
                                        'created_at'=>now(),
                                        'updated_at'=>now()	
                                        ]);
								}				

							
						
						}
				}
			$status="El registro se ha guardado correctamente";
		return back()->with(compact('status'));
    }    
     public function store(Request $request)
    {
       			
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(expedientes $documento)
    {
        //dd($documento);
        $id_expediente=$documento->id;
        $ad=asigna_documentos::with('actuaciones')->where('expedientes_id',$id_expediente)->orderBy('created_at','ASC')->get();
        //$documentos=DB::select('SELECT * FROM documentos,actuaciones WHERE actuaciones.id=documentos.id_actuacion 
        //AND documentos.id_expedientes='.$id_expediente);
        dd($documentos);
        return view('documentos.show',compact('documento', 'documentos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(documentos $documento)
    {
        //dd($documento);
        return view('documentos.edit',compact('documento'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, documentos $documento)
    {
      // dd($documento);
     $ad=asignadocumentos::where('documentos_id',$documento->id)->first();
     $id_expedientes=$ad->expedientes_id;
     $expedientes=expedientes::where('id',$id_expedientes)->first();
     $folio=$expedientes->folio;
     $actuaciones=actuaciones::where('id',$request->actuacion_id)->first();
     //$validatedData= $request->validate(['fojas' => 'required']);//aqui
     $fecha=now();	
     $fecha_int=strtotime($fecha);
     $anio= date("Y", $fecha_int);
     //$id_aa=$aa->id;
     //dd($documento->expedientes->folio);  
     //dd($folio);        
    
     $max_size=(int)ini_get('upload_max_filesize')*10240;
     if($request->hasFile('documento'))
     {
         $documentos=$request->file('documento');
         //dd($documentos, $fecha. $anio, $folio );
         foreach($documentos as $document)
             {
                 $file_name=encrypt($document->getClientOriginalName()).'.'.$document->getClientOriginalExtension();
                 if(Storage::PutFileAs('/public/'.'/estrados/'.$anio.'/'.$folio.'/', $document,  $document->getClientOriginalName()))
                     {
                                               
                         $documento->nombre_dcto=$document->getClientOriginalName();
                         $documento->code_name =$file_name;
                         $documento->updated_at=now();	
                         $documento->save();
                     }				

                 
             
             }
     }
 $status="El registro se ha actualizado correctamente";
return back()->with(compact('status'));
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
