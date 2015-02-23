<?php

class EspeciesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $especies = Especie::paginate(5);
        return View::make('especies.index', compact('especies'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $especies = Especie::all();
        return View::make('especies.index', compact('especies'));        
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $validation = Validator::make($input, Especie::$rules);        
        if ($validation->passes())
        {
        	$nombre = Input::only('NOMBRE');
        	if (!Especie::where('NOMBRE', '=', $nombre)->first()){
	            Especie::create($input);
	            return Redirect::route('especies.index');        		
        	}
        	else {
				return Redirect::route('especies.index')
	            ->with('message', 'Trying to add an existing race');
        	}
        }
        return Redirect::route('especies.index')
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
        $especies = Especie::all();
        return View::make('especies.index', compact('especies'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$especie = Especie::find($id);
        if (is_null($especie))
        {
            return Redirect::route('especies.index');
        }
        return View::make('especies.edit', compact('especie'));
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
        $validation = Validator::make($input, Especie::$rules);
        if ($validation->passes())
        {
            $especie = Especie::find($id);
            $especie->update($input);
            return Redirect::route('especies.show', $id);
        }
        return Redirect::route('especies.edit', $id)
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
		Especie::find($id)->delete();
		return Redirect::route('especies.index');
	}


}
