<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\accesos;
use App\user;

class AccesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
      
		$lg=$request->get('search');	
        $accesos=accesos::with('user')
        ->orderBy('id','DESC')
        ->last_login($lg)        
        ->paginate(10);
        //dd($users[0]->accesos[0]);
        return view('accesos.index', compact('accesos'));
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
    public function destroy(accesos $acceso)
    {
        //dd($acceso);
        $acceso->delete();
		//Flash::warning('El área ha sido eliminada');
		//return redirect()->route('admin_area');

	    /*$this->emit('sweet-alert', 'la información se borro correctamente');
        $this->resetPage();*/
		//$status="El registro se ha eliminado correctamente";
		//return back()->with(compact('status'));
        $status="El acceso se ha eliminado de manera correcta";
		$type="success";
		return redirect()->route('accesos.index', compact('status','type'));
    }
}
