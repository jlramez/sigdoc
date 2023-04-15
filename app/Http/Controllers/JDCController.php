<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expedientes;
use App\documentos;
use App\asignadocumentos;
use App\juicios;
use Illuminate\Support\Facades\DB;

class JDCController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest');
    }/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($juicio)
    {
        //$year=DB::select('SELECT COUNT DISTINCT year  FROM expedientes where juicios_id='.$id_juicios);
        
        if ($juicio==1)
        {
            
            $id_juicios=1;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
                //dd("de aqui sigue");
                $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Juicio para la Protección de los Derechos Político Electorales del Ciudadano";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Juicio para la Protección de los Derechos Político Electorales del Ciudadano";
                }
            
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==2)
        {
            $id_juicios=2;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
                {
                    $nombre_juicio="Recurso de Revisión";
                }
                else
                {
                $nombre_juicio=$nj->juicios->Nombre;
                }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Recurso de Revisión";
                }
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==3)
        {
            $id_juicios=3;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Juicio de Nulidad Electoral";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Juicio de Nulidad Electoral";
                }
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==4)
        {
            $id_juicios=4;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Juicio de Relaciones Laborales";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Juicio de Relaciones Laborales";
                }
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==5)
        {
            $id_juicios=5;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Asuntos Generales";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Asuntos Generales";
                }
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==6)
        {
            $id_juicios=6;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Procedimiento Especial Sancionador";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Procedimiento Especial Sancionador";
                }
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==7)
        {
            $id_juicios=7;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Juicio Electoral";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Juicio Electoral";
                }
                
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==8)
        {
            $id_juicios=8;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Lista de Asuntos a tratar en Sesión Pública";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Lista de Asuntos a tratar en Sesión Pública";
                }
                
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==9)
        {
            $id_juicios=9;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Acta de Sesión Pública";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Acta de Sesión Pública";
                }
                
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==10)
        {
            $id_juicios=10;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Acuerdos Generales ";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Acuerdos Generales ";
                }
                
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==11)
        {
            $id_juicios=11;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Ratificaciones de Convenio ";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Ratificaciones de Convenio ";
                }
                
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
        if ($juicio==12)
        {
            $id_juicios=12;
            $dif_years=DB::select('SELECT COUNT(DISTINCT anio) AS "dif_year" FROM expedientes where juicios_id='.$id_juicios);
            //dd($dif_years[0]->dif_year);
            if ($dif_years[0]->dif_year>1)
                {
                    $years=DB::select('SELECT DISTINCT(anio) FROM expedientes where juicios_id='.$id_juicios);
                    //dd("de aqui sigue");
                    return view('year', compact('years','id_juicios'));
                }
            $expedientes=expedientes::with('juicios')->where('juicios_id',$id_juicios)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Dictamen de la Elección de Gobernador ";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Dictamen de la Elección de Gobernador ";
                }
                
            return view('jdc', compact('expedientes', 'nombre_juicio'));
        }
    }


    public function index_year($juicio, $anio)
    {
        //$year=DB::select('SELECT COUNT DISTINCT year  FROM expedientes where juicios_id='.$id_juicios);
        //dd($juicio, $anio);
        if ($juicio==1)
        {            
            //dd($juicio, $anio);
            $id_juicios=1;            
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            //$expedientes=DB::select('SELECT * FROM expedientes, juicios WHERE expedientes.juicios_id=juicios.id AND expedientes.juicios_id='.$id_juicios.' AND anio='.$anio);
            //dd($expedientes);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Juicio para la Protección de los Derechos Político Electorales del Ciudadano";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Juicio para la Protección de los Derechos Político Electorales del Ciudadano";
                }
            
                
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==2)
        {
            $id_juicios=2;
            
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
                {
                    $nombre_juicio="Recurso de Revisión";
                }
                else
                {
                $nombre_juicio=$nj->juicios->Nombre;
                }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Recurso de Revisión";
                }
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==3)
        {
            $id_juicios=3;
            
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Juicio de Nulidad Electoral";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Juicio de Nulidad Electoral";
                }
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==4)
        {
            $id_juicios=4;
           
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Juicio de Relaciones Laborales";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Juicio de Relaciones Laborales";
                }
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==5)
        {
            $id_juicios=5;
           
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Asuntos Generales";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Asuntos Generales";
                }
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==6)
        {
            $id_juicios=6;
           
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Procedimiento Especial Sancionador";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Procedimiento Especial Sancionador";
                }
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==7)
        {
            $id_juicios=7;
           
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Juicio Electoral";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Juicio Electoral";
                }
                
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==8)
        {
            $id_juicios=8;
           
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Lista de Asuntos a tratar en Sesión Pública";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Lista de Asuntos a tratar en Sesión Pública";
                }
                
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==9)
        {
            $id_juicios=9;
           
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Acta de Sesión Pública";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Acta de Sesión Pública";
                }
                
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==10)
        {
            $id_juicios=10;
           
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Acuerdos Generales ";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Acuerdos Generales ";
                }
                
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==11)
        {
            $id_juicios=11;
           
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Ratificaciones de Convenio";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Ratificaciones de Convenio";
                }
                
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        if ($juicio==12)
        {
            $id_juicios=12;
           
            $expedientes=expedientes::with('juicios')->where('juicios_id', $id_juicios)->where('anio', $anio)->OrderBy('created_at','DESC')->paginate(10);
            $nj=expedientes::with('juicios')->where('juicios_id',$id_juicios)->first();
            if ($nj==NULL)
            {
                $nombre_juicio="Dictamen de la Elección de Gobernador";
            }
            else
            {
            $nombre_juicio=$nj->juicios->Nombre;
            }
            $ej=DB::select('SELECT COUNT(*) as cuantos FROM expedientes  WHERE juicios_id='.$id_juicios);
            $existe_juicio=$ej[0]->cuantos;
            if ($existe_juicio==0)
                {
                    $nombre_juicio="Dictamen de la Elección de Gobernador";
                }
                
                return view('juicio-anio', compact('expedientes', 'nombre_juicio','id_juicios'));
        }
        
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
    public function show(expedientes $expediente)
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
