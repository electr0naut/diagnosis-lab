<?php

class ContactosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $contactos = Contacto::paginate(5);


        foreach ($contactos as $contacto => $entidad) {
			$temp = Entidad::find($entidad['ENTIDAD']);
			$contactos[$contacto]['NOMBRENTIDAD'] = $temp['NOMBRE'];


			#$entidadesList = Especie::find($entidad['ESPECIE'])->contactos; 
        	
        }
        Debugbar::info($contactos);        	
        return View::make('contactos.index', compact('contactos'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        #$contactos = Contacto::all();
        return View::make('contactos.index');#, compact('contactos'));        
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $validation = Validator::make($input, Contacto::$rules);        
        if ($validation->passes())
        {
            Contacto::create($input);
            $contactos = Contacto::paginate(5);
	        return Redirect::route('contactos.index', compact('contactos'));        		
        	
        }
        return Redirect::route('contactos.index')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $contactos = Contacto::paginate(5);
        return View::make('contactos.index', compact('contactos'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contacto = Contacto::find($id);
        if (is_null($contacto))
        {
            return Redirect::route('contactos.index');
        }
        return View::make('contactos.edit', compact('contacto'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::all();
        $validation = Validator::make($input, Contacto::$rules);
        if ($validation->passes())
        {
            $contacto = Contacto::find($id);
            $contacto->update($input);
            return Redirect::route('contactos.show', $id);
        }
        return Redirect::route('contactos.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Contacto::find($id)->delete();
		return Redirect::route('contactos.index');
	}


}
